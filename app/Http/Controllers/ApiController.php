<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Persona;

class ApiController extends Controller
{
    public function infouser(Request $request)
    {
        return $request->user();
    }
}
