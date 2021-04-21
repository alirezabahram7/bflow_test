<?php


namespace App\Flows;


class bFlow
{
    public function evaluate($currentState, $flowName)
    {
        $sate = State::where('alias', $currentState)->where('flow_name', $flowName)->get()->first();
        //check if exists
        //check if he has been allowed to be in this state

        //بعد چک پوینتش نمیتونه بره
        //قبل چک پوینتش مجازها مشخص شه
        // مجاز به بک هست ؟
        //if not redirect him to his correct state
        //add general methods to evaluate all user data to estimate his real state : like check flow and check visit status
        if($sate and $sate->is_conditional==true){
            //call as method
        }
        //return string or Call all as methods
        //or
        //if its method doesnt exists return it as string
    }
}
