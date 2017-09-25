<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 25-9-17
 * Time: 18:33
 */
?>
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <div>
        Email
        <input type="email" name="email" value="{{old('emmail')}}">
    </div>
    <div>
        Password
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="checkbox" name="remember"> Remember me
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
