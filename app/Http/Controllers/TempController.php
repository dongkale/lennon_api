<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempController extends Controller {
    /**
     * Show the profile for a given user.
     */
    public function show() {
        return response()->json([
            'temp' => 'ok',
        ]);
    }
}
