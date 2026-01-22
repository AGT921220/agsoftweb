@php
    $whatsappConfig = config('contact.whatsapp');
    $phone = $whatsappConfig['phone'];
    $text = $whatsappConfig['text'];
    $encodedText = rawurlencode($text);
    $url = "https://wa.me/{$phone}?text={$encodedText}";
@endphp

<a 
    href="{{ $url }}" 
    target="_blank" 
    rel="noopener noreferrer"
    class="whatsapp-float"
    title="Contáctanos por WhatsApp"
    aria-label="Contáctanos por WhatsApp"
    data-tracking="whatsapp_floating"
    onclick="if(typeof gtag !== 'undefined') { gtag('event', 'click_whatsapp', {'event_category': 'engagement', 'event_label': 'whatsapp_floating'}); } console.log('WhatsApp floating click');">
    <i class="fab fa-whatsapp"></i>
</a>
