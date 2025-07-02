<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function getDummy()
    {
        return response()->json([
            'name' => 'Nishant Mainwal',
            'role' => 'Full Stack Developer'
        ]);
    }
}
