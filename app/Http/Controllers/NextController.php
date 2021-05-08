<?php

namespace App\Http\Controllers;

use App\Flows\State;
use Illuminate\Http\Request;

class NextController extends Controller
{
    public function getNext(Request $request){
        $xRoute = $request->header('X-ROUTE');
        return State::getNextState($request->user_id,$xRoute);
    }

}
