@extends('layouts.default')
@section('content')
    <h3>The Bills Page</h3>

    <div class="col-md-8 col-md-offset-2 ">

        <table class="table">
            <thead class="thead">
            <tr>
                @foreach($columns as $column)
                    <th>{{$column}}</th>
                @endforeach
            </tr>
            </thead>

            @if($rows != NULL)
                @foreach($rows as $row)
                    <tr>
                        @foreach($row as $variable)
                            <td>{{$variable}}</td>
                        @endforeach
                    </tr>
                @endforeach
            @endif

        </table>
    </div>
    {{$warning}}

@stop