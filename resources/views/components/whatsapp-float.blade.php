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
>
    <i class="fab fa-whatsapp"></i>
</a>
