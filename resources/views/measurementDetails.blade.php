@extends('layouts.default')
@section('content')

    <div id="graph"></div>
    <?= Lava::render('LineChart', 'Graph', 'graph') ?>

    <h3>Measurements</h3>
    Showing measurement with Group ID: {{$measurementid}}

    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
        <thead>
        <tr>
            @foreach($headers as $header)
                <td>{{$header}}</td>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($details as $Measurement)
            <tr>
                @foreach($Measurement as $detail)
                    <td>{{$detail}}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@stop