<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('punya_akses')) {
    function punya_akses($fitur)
    {
        $user = Auth::user();
        if (!$user || !$user->role) {
            return false;
        }

        return $user->role->{$fitur} ?? false;
    }
}
