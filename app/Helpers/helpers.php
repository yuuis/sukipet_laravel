<?php

use App\Models\User;


if (! function_exists("hasLogin")) {
    function hasLogin() {
        return (session()->get("user_id"));
    }
}

if (! function_exists("currentUser")) {
    function currentUser() {
        if(hasLogin()) {
            return User::find(session()->get("user_id"));
        }
    }
}