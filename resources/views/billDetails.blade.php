@extends('layouts.default')
@section('content')
    <h3>The Bills Page</h3>
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
    <thead>
    @foreach($columns as $column)
        <th>{{$column}}</th>
    @endforeach
    </thead>
    <tbody>
    @if($rows != NULL)
        @foreach($rows as $row)
            <tr>
                @foreach($row as $variable)
                    <td>{{$variable}}</td>
                @endforeach
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

    {{$warning}}

@stop
