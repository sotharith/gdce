<?php return [
    
    /*
    |--------------------------------------------------------------------------
    | Package Configuration Option
    |--------------------------------------------------------------------------
    | Describe what it does. 
    */

    'environment' => 'development', //Change to production on the production environment

    'cnsw_host'=> env('CNSW_HOST', ''),
    'cnsw_client_id'=>env('CNSW_CLIENT_ID', ''),
    'cnsw_client_secret'=>env('CNSW_CLIENT_SECRET',''),
    'cnsw_redirect'=>env('CNSW_REDIRECT', ''),
    'cnsw_app_cookie_name'=>env('CNSW_APP_COOKIE_NAME', '')
];
