<?php

return [
    'REG' => ['description' => 'ثبت نام ناقص', 'next' => 'startRegProcess'],
    'PWAIT' => ['description' => 'در انتظار تایید پرداخت', 'next' => 'getPaymentCardWait'],
    'POK' => ['description' => 'پرداخت موفق (ترم تشکیل شده اما ویزیت فعال ندارد)', 'next' => 'goForNextStep'],
    'PFAIL' => ['description' => 'پرداخت ناموفق', 'next' => 'startPaymentProcess'],
    'ETERM' => ['description' => 'ترم منقضی شده', 'next' => 'checkTermStatus'],
    // should be checked if it need to be renewed or revived
    'EVISIT' => ['description' => 'ویزیت منقضی شده', 'next' => 'getWeightAlert'],
    'EMENU' => ['description' => 'لیست غذایی ندارد', 'next' => 'getMenuAlert'],
    'EFOOD' => ['description' => 'لیست غذایی خالی است', 'next' => 'getFood'],
    'NORMAL' => ['description' => 'وضعیت نرمال', 'next' => 'getView'],
    'BLOCKED' => ['description' => 'ممانعت از رژیم به علت بیماری', 'next' => 'checkSicknessStatus', 'needUserId' => true],
    'DBLOCKED' => ['description' => 'ممانعت از رژیم', 'next' => 'getBlock'],
    'SPAY' => ['description' => 'شروع پرداخت', 'next' => 'startPaymentProcess'],
];
