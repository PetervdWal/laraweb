@extends('layouts.default')
@section('content')
    <h3>The Bills Page</h3>
    {{$warning}}
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
    <thead>
    <tr>
    <tr>
        @foreach($columns as $column)
            <th>{{$column}}</th>
        @endforeach
    </tr>
    </tr>
    </thead>
    <tbody>

        @foreach($bills as $bill)
            <tr>
                @foreach($bill as $variable)
                    <td>{{$variable}}</td>
                @endforeach
                <td><a href="{{URL::to('/bills/'.$bill->id)}}" class="btn-default">details</a></td>
            </tr>
        @endforeach

    </tbody>
</table>
@stop