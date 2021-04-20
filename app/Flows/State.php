<?php


namespace App\Flows;


class State
{
    /**
     * @var array
     */
    protected $auth = [
        '/',
        '%checkRegistryStatus$response',
        '/verify',
        '%checkIfUserVerified$response',
        '/register',
        '%startRegProcess',
        '/login',
        '%checkFlow$userId',
        '/login/forget',
        '/pass/verify',
        '%checkIfResetVerified$response',
        '/pass/reset',
        '%checkFlow$userId',
    ];

    /**
     * @var array
     */
    protected $reg = [
        '/diet/type',
        '%checkDietSelection$userId',
        '/size',
        '/report',
        '/sick/select',
//        '/special',
        '/package',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%checkPaymentAuthorization$userId',
        '%startPaymentProcess',
        '/activity',
        '/diet/history',
        '/diet/goal',
        '/overview',
        '%checkCountry$userId',
        '/messenger',
        '%checkHavingPhysicalPackage$userId',
        '/postal',
        '/menu/select',
        '/menu/confirm',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ];

    /**
     * @var array
     */
    protected $renew = [
        '/alert',
        '/diet/type',
        '%checkDietSelection$userId',
        '/weight',
        '/sick/select',
//        '/special',
        '/package',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%checkPaymentAuthorization$userId',
        '%startPaymentProcess', //?
        '/activity',
        '%checkHavingPhysicalPackage$userId',
        '/postal',
        '/menu/select',
        '/menu/confirm',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ];

    /**
     * @var array
     */
    protected $revive = [
        '/alert',
        '/diet/type',
        '%checkDietSelection$userId',
        '/size',
        '/sick/select',
//        '/special',
        '/package',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%checkPaymentAuthorization$userId',
        '%startPaymentProcess', //?
        '/activity',
        '%checkHavingPhysicalPackage$userId',
        '/postal',
        '/menu/select',
        '/menu/confirm',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ];

    /**
     * @var array
     */
    protected $payment = [
        '/payment/bill',
        '%checkPaymentAuthorization2$userId',
        '%checkPaymentType$paymentTypeId',
        '/payment/card',
        '%checkPaymentAuthorization3$userId',
        '/payment/card/wait',
        '%checkCardPaymentStatus$userId',
        '/payment/card/confirm',
        '%goForNextStep',
        '/payment/online/success',
        '%goForNextStep',
        '/payment/online/fail',
        '%startPaymentProcess',
        '/payment/card/reject',
        '%startPaymentProcess',
    ];

    /**
     * @var array
     */
    protected $list = [
        '%startList',
        '%checkVisitStatus$userId',
        '/view',
        '%checkVisitStatus$userId',
        '/menu/alert',
        '/menu/select',
        '%checkMenuType$userId',
        '/food',
        '%checkVisitStatus$userId',
        '/weight/alert',
        '/weight/enter',
        '/sick/select',
//        '/special',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ];
}
