@extends('base')
@section('content')
    <form method="POST" action="/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Select file to upload (.csv)</label>
            <input type="file" class="form-control" name="file" id="file" />
        </div>
        <div class="d-grid gap-2 mt-3">
            <input type="submit" class="btn btn-primary" name="file" id="file" value="Upload" />
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@stop
