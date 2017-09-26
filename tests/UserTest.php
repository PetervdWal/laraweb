<?php

/**
 * Created by PhpStorm.
 * User: peter
 * Date: 25-9-17
 * Time: 22:03
 */
class UserTest extends TestCase
{
    public function testHomePage(){
        $this->visit("/")
        ->see("My health app");
    }

    public function testRegister(){
        $this->visit("/auth/register")
            ->type("Test", 'name')
            ->type("test@test.nl", 'email')
            ->type("test", 'password')
            ->type("test", 'password_confirmation')
            ->press("Register")
            ->seePageIs('/dashboard');
        $this->testLogin();
        //TODO undo data after test
    }
    private function testLogin(){

        $this->visit('/auth/logout');
        $this->visit('/auth/login')
            ->type('test@test.nl', 'email')
            ->type('test', 'password')
            ->press("Login")
            ->seePageIs('/dashboard');

    }
}