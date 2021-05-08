<?php


namespace App\Flows;


class PaymentFlow extends bFlow
{
    public $prefix = 'payment/';
    public $isMainFlow = false;
    public $isDependantFlow = true;

    public static $flowArray = [
        '/payment/bill',
        '%checkPaymentType$paymentTypeId',
        '/payment/card',
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
}
