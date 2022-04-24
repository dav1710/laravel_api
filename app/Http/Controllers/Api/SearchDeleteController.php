<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Desk;
use Illuminate\Http\Request;

class SearchDeleteController extends Controller
{
    function search($token){
        return Desk::where("token", "like", "%".$token."%")->get();
    }
}
