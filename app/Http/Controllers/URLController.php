<?php

namespace App\Http\Controllers;

use App\Models\StatusCodes;
use App\Models\URLStatusCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class URLController extends Controller
{
    //private function read
    public function createForm()
    {
        return view('components.input');
    }

    /**
     *  @param Request $request
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $fileUploaded = $request->file('file');
        $urls = [];

        if (($handle = fopen($fileUploaded->getRealPath(), 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $urls[] = $row;
            }
            fclose($handle);
        }

        $urls = $this->getStatusCodes($urls);

        return redirect('/list');
    }

    public function list()
    {
        $urls = DB::table('status_codes')->paginate(10);

        return view('components.table', [
            'urls' => $urls
        ]);
    }

    private function save($url, $code)
    {
        $URLStatusCode = StatusCodes::create([
            'url' => $url,
            'code' => $code
        ]);

        $URLStatusCode->save;
    }

    private function getStatusCodes(array $urls)
    {
        foreach ($urls as $url) {
            $url = $url ? $url[0] : 'invalid';
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $response = Http::get($url);
                $status = $response->status();
            } else {
                $status = 400;
            }

            $this->save($url, $status);
        }
    }
}
