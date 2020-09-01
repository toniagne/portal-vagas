<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Captcha Credentials
   |--------------------------------------------------------------------------
   |
   | Credenciais para configuração do captcha.
   |
   */
    'key' => env('RECAPTCHA_KEY','6LeI-a4UAAAAACC7eGr8QVUfmhrhFtZ65mj28UJH'),
    'secret' => env('RECAPTCHA_SECRET','6LeI-a4UAAAAAJMiuBDFA0XGhY7yB7H67MPTAGq1'),
    'host' => env('RECAPTCHA_HOST', 'http://localhost'),
];
