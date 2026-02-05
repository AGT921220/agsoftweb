@props([
    'text' => null,
    'label' => 'Cotizar por WhatsApp',
    'size' => 'lg',
    'class' => '',
    'tracking' => 'whatsapp_button',
])

@php
    $whatsappConfig = config('contact.whatsapp');
    $phone = $whatsappConfig['phone'];
    $defaultText = $whatsappConfig['text'];
    $message = $text ?? $defaultText;
    $encodedMessage = rawurlencode($message);
    $url = "https://wa.me/{$phone}?text={$encodedMessage}";
@endphp

<a 
    href="{{ $url }}" 
    target="_blank" 
    rel="noopener noreferrer"
    class="btn btn-success btn-{{ $size }} {{ $class }}"
    data-tracking="{{ $tracking }}">
    <i class="fab fa-whatsapp me-2"></i>{{ $label }}
</a>
