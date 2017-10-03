@extends('layouts.default')
@section('content')
    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
        <thead>
        <tr>
            @foreach($headers as $header)
                <td>{{$header}}</td>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($measurements as $measurement)
            <tr>
                @foreach($measurement as $value)
                    <td>{{$value}}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@stop