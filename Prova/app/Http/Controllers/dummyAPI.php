<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    //
    function getData()
    {
        return ["name" => "Joan", "email" => "jnaladid99@gmail.com"];
    }
}
