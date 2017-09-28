@extends('layouts.default')
@section('content')
    <h3>The Bills Page</h3>
    {{$warning}}

    <div class="col-md-8 col-md-offset-2 ">

        <table class="">
            <tr>
                @foreach($columns as $column)
                    <td>{{$column}}</td>
                @endforeach
            </tr>

            @if($bills != NULL)
                @foreach($bills as $bill)
                    <tr>
                        @foreach($bill as $variable)
                            <td>{{$variable}}</td>
                        @endforeach
                        <td><a href="{{URL::to('/bills/'.$bill->id)}}" class="btn-default">details</a></td>
                    </tr>
                @endforeach
            @endif

        </table>
    </div>

@stop