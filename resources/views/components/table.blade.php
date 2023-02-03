@extends('base')
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>URL</th>
                <th>Status Code</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($urls as $url)
                <tr>
                    <td>{{ $url->url }}</td>
                    <td>{{ $url->code }}</td>
                    <td>{{ $url->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        $pagination = $urls;
    @endphp

    @include('components.pagination')
@stop
