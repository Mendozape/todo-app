<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function count()
    {
        $userCount = User::count();
        return response()->json(['count' => $userCount]);
    }
}
