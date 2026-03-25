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

    // // 'whatsapp' => [
    // //     'phone' => '5218114875729', // Código de país + número sin espacios ni guiones
    // //     'text' => 'Hola, quiero una cotización. Necesito: ____ . Mi ciudad: ____ . ¿Cuándo podemos hablar?',
    // //     'url' => 'https://wa.me/5218114875729?text=Hola%2C%20quiero%20una%20cotización.%20Necesito%3A%20____%20.%20Mi%20ciudad%3A%20____%20.%20¿Cuándo%20podemos%20hablar%3F',
    // // ],
    // 'whatsapp' => [
    //     'phone' => '5218114875729',
    //     'text' => 'Hola, vengo de tu sitio web. Estoy evaluando mejorar u automatizar procesos en mi empresa. Brevemente: Giro de la empresa: ____ | Operación que queremos optimizar: ____ | Cómo lo hacemos hoy: ____ | Cuántas personas lo usarían: ____ ¿Podemos agendar una llamada?',
    //     'url' => 'https://wa.me/5218114875729?text=Hola%2C%20vengo%20de%20tu%20sitio%20web.%20Estoy%20evaluando%20mejorar%20u%20automatizar%20procesos%20en%20mi%20empresa.%20Brevemente%3A%20Giro%20de%20la%20empresa%3A%20____%20%7C%20Operaci%C3%B3n%20que%20queremos%20optimizar%3A%20____%20%7C%20C%C3%B3mo%20lo%20hacemos%20hoy%3A%20____%20%7C%20Cu%C3%A1ntas%20personas%20lo%20usar%C3%ADan%3A%20____%20%C2%BFPodemos%20agendar%20una%20llamada%3F',
    // ],

    // // 'email' => [
    // //     'address' => 'contacto@agsoftweb.com.mx',
    // //     'subject' => 'Cotización - AG SoftWeb',
    // //     'body' => 'Hola, quiero una cotización para mi proyecto. Necesito: ____ . Mi ciudad: ____ . ¿Cuándo podemos hablar?',
    // //     'url' => 'mailto:contacto@agsoftweb.com.mx?subject=Cotización%20-%20AG%20SoftWeb&body=Hola%2C%20quiero%20una%20cotización%20para%20mi%20proyecto.%20Necesito%3A%20____%20.%20Mi%20ciudad%3A%20____%20.%20¿Cuándo%20podemos%20hablar%3F',
    // // ],
    // 'email' => [
    //     'address' => 'contacto@agsoftweb.com.mx',
    //     'subject' => 'Evaluación de procesos - AG SoftWeb',
    //     'body' => 'Hola, vengo de su sitio web. Me interesa evaluar la mejora o automatización de procesos en mi empresa. Giro: ____ Operación a optimizar: ____ Cómo lo hacemos actualmente: ____ Número aproximado de usuarios: ____ ¿Podemos agendar una llamada?',
    //     'url' => 'mailto:contacto@agsoftweb.com.mx?subject=Evaluaci%C3%B3n%20de%20procesos%20-%20AG%20SoftWeb&body=Hola%2C%20vengo%20de%20su%20sitio%20web.%20Me%20interesa%20evaluar%20la%20mejora%20o%20automatizaci%C3%B3n%20de%20procesos%20en%20mi%20empresa.%20Giro%3A%20____%20Operaci%C3%B3n%20a%20optimizar%3A%20____%20C%C3%B3mo%20lo%20hacemos%20actualmente%3A%20____%20N%C3%BAmero%20aproximado%20de%20usuarios%3A%20____%20%C2%BFPodemos%20agendar%20una%20llamada%3F',
    // ],

    'whatsapp' => [
    'phone' => '5218114875729',
    'text' => 'Hola, vengo de tu sitio web. Estoy evaluando desarrollar o mejorar un sistema para mi empresa. ¿Podemos agendar una llamada esta semana?',
    'url' => 'https://wa.me/5218114875729?text=Hola%2C%20vengo%20de%20tu%20sitio%20web.%20Estoy%20evaluando%20desarrollar%20o%20mejorar%20un%20sistema%20para%20mi%20empresa.%20%C2%BFPodemos%20agendar%20una%20llamada%20esta%20semana%3F',
],

'email' => [
    'address' => 'contacto@agsoftweb.com.mx',
    'subject' => 'Evaluación de sistema - AG SoftWeb',
    'body' => 'Hola, vengo de su sitio web. Estoy evaluando desarrollar o mejorar un sistema para mi empresa. ¿Podemos agendar una llamada esta semana?',
    'url' => 'mailto:contacto@agsoftweb.com.mx?subject=Evaluaci%C3%B3n%20de%20sistema%20-%20AG%20SoftWeb&body=Hola%2C%20vengo%20de%20su%20sitio%20web.%20Estoy%20evaluando%20desarrollar%20o%20mejorar%20un%20sistema%20para%20mi%20empresa.%20%C2%BFPodemos%20agendar%20una%20llamada%20esta%20semana%3F',
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
