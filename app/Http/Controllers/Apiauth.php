<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Apiauth extends Controller
{
    //

public function yourAction()
{
    $userId = 7;
    // $token = jwt_encode(['user_id' => $userId]);

    $cookie = cookie('access_token', "some token", 60); // Set the 'access_token' cookie for 60 minutes

    return response()
        ->json(['message' => 'Token set successfully'])
        ->cookie($cookie);
}

}
