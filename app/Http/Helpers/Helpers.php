<?php

//pagination..
function pagi()
{
	return 10;
}

// email..
function isEmail()
{
	return true;
}

//check session route permissions accordingly user role
function checkPermission($permissions)
{
	$user = auth()->user();
    if ($permissions == $user->role) {
        return true;
    }
    return false;
}

function message($a)
{
    return $a;
}
