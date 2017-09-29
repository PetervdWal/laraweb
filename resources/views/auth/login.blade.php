<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 25-9-17
 * Time: 18:33
 */
?>
@extends('layouts.default')

@section('headerTitle')
    <h4>
        Welcome to MyHealth
    </h4>
    @stop

@section('content')
        <form class="center" method="POST" action="/api/v1/users/getUser/login">
            {!! csrf_field() !!}
            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="email" id="email" name="email">
                    <label class="mdl-textfield__label" for="email">Email...</label>
                </div>
                <div class="mdl-layout-spacer"></div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" id="password" name="password">
                    <label class="mdl-textfield__label" for="password">Password...</label>
                </div>
                <div class="mdl-layout-spacer"></div>
            </div>

            {{--TODO: Checkbox in MDL Style--}}
            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <label for="rememberME">
                    <input type="checkbox" id="rememberMe">
                    <span>Remember me</span>
                </label>
                <div class="mdl-layout-spacer"></div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id = "login">
                    Login
                </button>
                <div class="mdl-layout-spacer"></div>
            </div>
        </form>
@stop
