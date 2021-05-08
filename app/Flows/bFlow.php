<?php


namespace App\Flows;


use Illuminate\Support\Str;

class bFlow
{
    public $prefix;
    public static $flowArray = [];
    public $isMainFlow = true;
    public $isDependantFlow = false;

    public function __construct($prefix = null)
    {
        if ($prefix) {
            $this->prefix = $prefix;
        }
    }

    /**
     * @param $userId
     * @param $currentState
     * @param $flowName
     * @return mixed
     */
    public function evaluate($userId, $currentState, $flowName)
    {
        //check if flowArray is not empty
        // check if user is in right flow
        $userCheckpoint = \DB::table('checkpoint_user')->where('user_id', $userId)->where('flow_name', $flowName)->get(
        )->first()->checkpoint;
        if ( ! $userCheckpoint) {
            return $this->getUserMainState($userId);
        }

        // check if the state exists and user has been allowed to be in this state
        $state = array_search($currentState, $this->flowArray);
        //check if exists
        if ( ! $state) {
            return $this->getUserMainState($userId);
        }
        //check if user has been allowed to be in this state
        if (config('checkpoint')[$userCheckpoint]['state'] != $state) {
            $isAllowed = in_array($userCheckpoint, $this->flowArray[$state]);
            if ( ! $isAllowed) {
                return $this->getUserMainState($userId);
            }
        }

        return $this->getNext($currentState);
    }

    /**
     * @param $userId
     * @return mixed
     */
    protected function getUserMainState($userId)
    {
        $userMainCheckpoint = \DB::table('checkpoint_user')
            ->where('user_id', $userId)
            ->where('is_main_flow', true)
            ->get()->pluck('checkpoint');
        return $this->getState(config($userMainCheckpoint)['state']);
    }

    public function getState($state)
    {
        //check if its method exists
        if (method_exists($this, $state)) {
            return $this->callMethod($state);
        }
        return $state ? $this->prefix . $state : null;
    }

    //use iterator
    public function getNext($state)
    {
        $arrayKeys = array_keys($this->flowArray);
        $currentIndex = array_search($state,$arrayKeys);
        return $this->getState(next(@$arrayKeys[$currentIndex + 1]));//iterator ?
    }

    public function getPrev($state)
    {
        $arrayKeys = array_keys($this->flowArray);
        $currentIndex = array_search($state,$arrayKeys);
        return $this->getState(next(@$arrayKeys[$currentIndex - 1]));//iterator ?
    }


    protected function callMethod($state)
    {
        $functionPrefix = 'goTo';
        if (Str::startsWith($state, "%")) {
            $functionPrefix = '';
            $state = ltrim($state, '%');
        }
        $state = ltrim($state, '/');
        $functionName = $functionPrefix . $this->kebabToCamelCase($state, true);
        return $this->$functionName();
    }

    /**
     * @param $string
     * @param bool $capitalizeFirstCharacter
     * @return string|string[]
     */
    protected function kebabToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace(['-', '/'], ' ', $string)));

        if ( ! $capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }
        return $str;
    }

    //add general methods to evaluate all user data to estimate his real state : like check flow and check visit status

}
