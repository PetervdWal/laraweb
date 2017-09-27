<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 9/27/2017
 * Time: 1:48 PM
 */
?>
@extends('layouts.default')
@section('content')
    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Welcome</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Material</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Acrylic (Transparent)</td>
                    <td>25</td>
                    <td>$2.90</td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Plywood (Birch)</td>
                    <td>50</td>
                    <td>$1.25</td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Laminate (Gold on Blue)</td>
                    <td>10</td>
                    <td>$2.35</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Get Started
            </a>
        </div>
        <div class="mdl-card__menu">
            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                <i class="material-icons">share</i>
            </button>
        </div>
    </div>

    @stop