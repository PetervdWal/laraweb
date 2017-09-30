<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 9/27/2017
 * Time: 1:48 PM
 */
?>
<!--        TODO: Use variables instead of static names-->

        <!DOCTYPE html>
<html>
@extends('includes.navbar')
<head>
    <link rel="stylesheet" type="text/css" href="mdlDatePicker.scss">
    @section('headerTitle')
        <h4>
            Profile settings
        </h4>
</head>
@stop
@include('layouts.default')
<body>
@section('content')
    <form class = "" method="POST" action="">
        {{ csrf_field() }}
        {{--Personal section--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <h5 class = "title">
                Personal data
            </h5>
            <div class="mdl-layout-spacer"></div>
        </div>
        {{--Customer number--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                       id="customerNumber" value="{{$user->user_number}}" readonly name="userNumber">
                <label class="mdl-textfield__label" for="customerNumber">Customer Number</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>
        {{--Name Textfield--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="name" value="{{$user->name}}" disabled>
                <label class="mdl-textfield__label" for="name">Name...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>
        {{--Birthdate picker--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                {{--NTH make datepicker for date_of_birth--}}
                <input class="mdl-textfield__input" type="text" id="birthdate"
                       value="{{substr($user->date_of_birth,0,10)}}" disabled>
                <label class="mdl-textfield__label" for="birthdate">Birthdate...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        {{--BSN--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="bsnNumber"
                       value="{{$user->bsn}}" disabled>
                <label class="mdl-textfield__label" for="bsnNumber">BSN...</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>
{{--Contact gegevens--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <h5 class = "title">
                Contact data
            </h5>
            <div class="mdl-layout-spacer"></div>
        </div>
        {{--Address Textfield--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="address" name="street" value="{{$user->street}}">
                <label class="mdl-textfield__label" for="address">Address...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>
        {{--Home number --}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="number" id="homenumber" name="homeNumber" value="{{$user->home_number}}">
                <label class="mdl-textfield__label" for="homenumber">Home number</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>
        {{--Phonenumber--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="phoneNumber"
                    value="{{$user->phone_number}}" name="phoneNumber">
                <label class="mdl-textfield__label" for="phoneNumber">Phonenumber...</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>
        {{--Emailfield--}}
        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="email" id="emailAddress" value="{{$user->email}}" name="email">
                <label class="mdl-textfield__label" for="emailAddress">Email address...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <h5 class = "title">
                Insurance data
            </h5>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="insuranceCompany"
                       value="@if(!emptyArray($healthInsurance))
                                    {{$healthInsurance}}
                       @endif" disabled>
                <label class="mdl-textfield__label" for="insuranceCompany">Insurance Company...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="policyNumber"
                    value="{{$user->policy_number}}" disabled>
                <label class="mdl-textfield__label" for="policyNumber">Policy number...</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="insuranceType" value="{{$user->insurance_type}}"
                       disabled>
                <label class="mdl-textfield__label" for="insuranceType">Insurance Type</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="excess"
                value="{{$user->excess}}"
                        disabled>
                <label class="mdl-textfield__label" for="excess">Excess...</label>
            </div>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-layout-spacer"></div>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id = "login">
                Save
            </button>
            <div class="mdl-layout-spacer"></div>
        </div>
    </form>
@stop
<script type="text/javascript" href="{{ asset('js/mdlDatePicker.js') }}"></script>
</body>


</html>