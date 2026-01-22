<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Contact Configuration
    |--------------------------------------------------------------------------
    |
    | Configuración centralizada para enlaces de contacto (WhatsApp y Email)
    |
    */

    'whatsapp' => [
        'phone' => '5218114875729', // Código de país + número sin espacios ni guiones
        'text' => 'Hola, quiero una cotización. Necesito: ____ . Mi ciudad: ____ . ¿Cuándo podemos hablar?',
        'url' => 'https://wa.me/5218114875729?text=Hola%2C%20quiero%20una%20cotización.%20Necesito%3A%20____%20.%20Mi%20ciudad%3A%20____%20.%20¿Cuándo%20podemos%20hablar%3F',
    ],

    'email' => [
        'address' => 'contacto@agsoftweb.com.mx',
        'subject' => 'Cotización - AG SoftWeb',
        'body' => 'Hola, quiero una cotización para mi proyecto. Necesito: ____ . Mi ciudad: ____ . ¿Cuándo podemos hablar?',
        'url' => 'mailto:contacto@agsoftweb.com.mx?subject=Cotización%20-%20AG%20SoftWeb&body=Hola%2C%20quiero%20una%20cotización%20para%20mi%20proyecto.%20Necesito%3A%20____%20.%20Mi%20ciudad%3A%20____%20.%20¿Cuándo%20podemos%20hablar%3F',
    ],

    'response_time' => [
        'whatsapp' => 'Respuesta el mismo día (lun–vie)',
        'email' => 'Respuesta en menos de 24 horas (lun–vie)',
    ],

    'packages' => [
        'web' => [
            'name' => 'Sistema Web',
            'whatsapp_text' => 'Hola, me interesa cotizar un sistema web para automatizar mis procesos.',
        ],
        'mobile' => [
            'name' => 'App Móvil',
            'whatsapp_text' => 'Hola, me interesa cotizar una aplicación móvil para mi negocio.',
        ],
        'automation' => [
            'name' => 'Automatización',
            'whatsapp_text' => 'Hola, me interesa automatizar procesos e integraciones (WhatsApp, correo, APIs).',
        ],
    ],
];
