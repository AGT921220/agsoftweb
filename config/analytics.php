<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Analytics Provider
    |--------------------------------------------------------------------------
    | gtag = Google Analytics 4 (gtag.js). GTM = Google Tag Manager. none = desactivado.
    */
    'provider' => env('ANALYTICS_PROVIDER', 'gtag'),

    /*
    |--------------------------------------------------------------------------
    | GA4 Measurement ID
    |--------------------------------------------------------------------------
    | ID de medición GA4 (G-XXXXXXXXX). Solo se usa si provider = gtag.
    */
    'ga4_measurement_id' => env('GA4_MEASUREMENT_ID', 'G-K4XF8WCYPE'),

    /*
    |--------------------------------------------------------------------------
    | GTM Container ID
    |--------------------------------------------------------------------------
    | ID del contenedor GTM (GTM-XXXXXXX). Solo se usa si provider = gtm.
    */
    'gtm_container_id' => env('GTM_CONTAINER_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Habilitado
    |--------------------------------------------------------------------------
    | Si false, no se inyecta ningún script (útil para local sin env).
    */
    'enabled' => env('ANALYTICS_ENABLED', true),
];
