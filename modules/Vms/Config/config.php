<?php

return [
    'name' => 'Vms',
    'api_url' => env('VMS_API_URL', 'https://tap.sandbox.vms.frcs.org.fj'),
    'pac_code' => env('VMS_PAC_CODE', ''),
    'cashier_tin' => env('VMS_CASHIER_TIN', ''),
    'pos_number' => env('VMS_POS_NUMBER', '1'),
];
