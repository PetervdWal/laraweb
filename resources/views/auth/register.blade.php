<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 25-9-17
 * Time: 18:45
 */
?>
@extends('layouts.default')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
@stop