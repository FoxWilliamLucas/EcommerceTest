<?php
namespace App\ValidationRules;



class UserRules {





    public static function register(){
        return [
            "email"           => "email|unique:users,email",
            "name"            => "required|string|unique:users,name",
            "password"        => "required|string|min:6",
        ];
    }

    public static function login(){
        return [
            'email'         => 'required|email|exists:users,email',
            'password'      => 'required|string|min:4',
        ];
    }
} 