<?php


namespace App\Flows;


use Illuminate\Support\Str;

class State
{
    /**
     * @param $userId
     * @param $state
     * @param bool $needPrefix
     * @return array
     */
    public static function getNextState($userId, $state, $needPrefix = true)
    {
        //call detectFlow method
        list($state,$prefix,$flowClassName) = self::detectFlow($state);
        return call_user_func(array('Flows/'.$flowClassName, 'evaluate'));
    }

    public static function detectFlow($state)
    {
        $flowPrefixes = [
            'PaymentFlow' => '/payment/',
            'RegFlow' => 'reg/',
            'RenewFlow' => 'renew/',
            'ReviveFlow' => 'revive/',
            'ListFlow' => 'list/',
            'AuthFlow' => 'auth/'
        ];
        $prefix = $flowName = null;
        foreach ($flowPrefixes as $flowClassName => $flowPrefix) {
            if (str_contains($state, $flowPrefix)) {
                $arr = explode($flowPrefix, $state);
                $state = $arr[1];
                $prefix = $arr[0] . $flowPrefix;
                $flowName = $flowClassName;
            }
        }
        return array($state,$prefix,$flowName);
    }

}
