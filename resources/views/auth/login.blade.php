<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 25-9-17
 * Time: 18:33
 */
?>
@extends('layouts.default')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <form class="center" method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{old('emmail')}}">
            </div>
            <div>
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="checkbox" name="remember"> Remember me
                </div>
            </div>

            <div>
                <button class="btn btn-default" type="submit">Login</button>
            </div>
        </form>
    </div>
@stop
