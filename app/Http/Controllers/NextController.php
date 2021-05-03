<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NextController extends Controller
{
    public function getNext(Request $request){
        $xRoute = $request->header('X-ROUTE');
        //prefix $ current state
        //pascal case prefix or use if else
        //check if flow class exist
        //

    }

}
