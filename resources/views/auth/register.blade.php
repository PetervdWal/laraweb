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
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="registerName">
                <label class="mdl-textfield__label" for="name">Name...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="email" id="registerEmail">
                <label class="mdl-textfield__label" for="registerEmail">Email...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" id="registerPassword">
                <label class="mdl-textfield__label" for="registerPassword">Password...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" id="registerPasswordConfirmation">
                <label class="mdl-textfield__label" for="registerPasswordConfirmation">Confirm Password...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id = "register">
                Register
            </button>
            <div class="mdl-layout-spacer"></div>
        </div>
    </form>
    </div>
@stop