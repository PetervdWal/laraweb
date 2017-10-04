@extends('layouts.default')
@section('content')


    <h3>Measurements</h3>
    Showing: {{$measurementtype_shown}}
    <form method="POST" action="/measurements">
        <input type="hidden">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" name="type" value="{{\App\Http\Controllers\MeasurementsController::$BLOOD_PRESSURE}}"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Blood Pressure
        </button>
        <button type="submit" name="type" value="{{\App\Http\Controllers\MeasurementsController::$PULSE}}"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                Heart Pulse
        </button>
        <button type="submit" name="type" value="{{\App\Http\Controllers\MeasurementsController::$ECG_WAVES}}"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            ECG Waves
        </button>
    </form>
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