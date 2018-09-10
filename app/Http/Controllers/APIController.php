<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->input();
        return var_dump($input);
    }
}