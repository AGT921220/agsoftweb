<?php

return [
    'name' => 'AgSoftWeb',
    'whatsapp_link' => 'https://wa.me/5218114875729',
    'phone' => '8114875729',
    'email' => 'contacto@agsoftweb.com.mx',
    'description' => 'Desarrollamos soluciones innovadoras para hacer crecer tu negocio en la era digital.',
    'contact' => [
        'phone' => '81 1487 5729',
        'email' => 'contacto@agsoftweb.com.mx',
        'address' => 'Manuel Doblado 105, Palo Blanco, 66236 San Pedro Garza García, N.L.',
        // Para JSON-LD y schema (NAP consistente)
        'address_street' => 'Manuel Doblado 105, Palo Blanco',
        'address_locality' => 'San Pedro Garza García',
        'address_region' => 'N.L.',
        'postal_code' => '66236',
        'address_country' => 'MX',
        'maps_url' => 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode('Manuel Doblado 105, Palo Blanco, 66236 San Pedro Garza García, N.L.'),
        // URL para iframe del mapa embebido (misma dirección, output=embed)
        'maps_embed_url' => 'https://www.google.com/maps?q=' . rawurlencode('Manuel Doblado 105, Palo Blanco, 66236 San Pedro Garza García, N.L.') . '&output=embed&z=16',
    ],
    'useful_links' => [
        'services' => '#services',
        'projects' => '#projects',
        'faq' => '#faq',
        'contact' => '#contact',
    ]
];
