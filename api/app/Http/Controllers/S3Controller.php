<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class S3Controller extends Controller
{
    //

    public function index(){

        return response()->json([
            'status' => 'ok',
            'result' => 'Hello! this is s3 endpoint, test it'
        ]);
    }
}
