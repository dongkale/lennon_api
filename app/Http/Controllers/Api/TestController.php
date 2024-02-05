<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{    
    public function test(Request $request) 
    {   
        $arg1 = $request->arg1;
        $arg2 = $request->arg2;

        $arg1__ = request('arg1');
        $arg2__ = request('arg2');

        return response()->json([
            'arg1' => $arg1,
            'arg2' => $arg2,
        ]);    
    }
}
