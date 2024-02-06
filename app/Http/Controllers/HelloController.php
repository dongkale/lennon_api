<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller {
    /**
     * Show the profile for a given user.
     */
    public function show($arg = '') {
        return response()->json([
            'hello' => $arg,
        ]);
    }
}
