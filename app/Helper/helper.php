<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('role')) {
    function role()
    {
        return Auth::user()->role;
    }
}

if (!function_exists('user')) {
    function user(): ?Authenticatable
    {
        return Auth::user();
    }
}

