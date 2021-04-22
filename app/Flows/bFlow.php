<?php


namespace App\Flows;


class bFlow
{
    public function evaluate($userId,$currentState, $flowId)
    {
        //هم دیتابیس رو ساپورت کنه هم ارایه کانفیگ
        $stateId=\DB::table('state_user')->where('user_id',$userId)->where('flow_id',$flowId)->get()->first()->state_id;
        if(! $stateId){
            // should return him to his main flow
            // which flow is main ?
        }
        $state = State::where('alias', $currentState)->where('flow_id', $flowId)->get()->first();
        //check if exists
        //check if he has been allowed to be in this state
        if($stateId != $state->id) {
            $allowedState = \DB::table('allowed_actions')
                ->where('state_id', $stateId)
                ->where('allowed_state_id', $state->id)
                ->get();
            if(!$allowedState){
                //return him to his real state
            }
            }
        //بعد چک پوینتش نمیتونه بره
        //قبل چک پوینتش مجازها مشخص شه
        // مجاز به بک هست ؟
        //if not redirect him to his correct state
        //add general methods to evaluate all user data to estimate his real state : like check flow and check visit status
        if($state and $state->is_conditional==true){
            //call as method
        }
        //return string or Call all as methods
        //or
        //if its method doesnt exists return it as string
    }
}
