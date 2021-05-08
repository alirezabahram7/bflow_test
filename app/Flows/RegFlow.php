<?php


namespace App\Flows;


class RegFlow extends bFlow
{
    public $prefix = 'reg/';
    public $isMainFlow = true;

    public $flowArray = [
        'diet/type' => [
            'allowed_checkpoints' => ['REG'],
            'is_checkpoint' => true,
            'alias' => 'REG',
            'description' => 'صفحه انتخاب رژیم',
            'need_checking_flow' => false
        ],
        'size',
        'report',
        'sick/select',
//    'special',
        'package',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%startPaymentProcess',
        'activity',
        'diet/history',
        'diet/goal',
        'overview',
        '%checkCountry$userId',
        'messenger',
        '%checkHavingPhysicalPackage$userId',
        'postal',
        'menu/select',
        'menu/confirm',
        '%startFoodListProcess',
        'sick/block',
        '%checkSicknessStatus$userId',
    ];


}
