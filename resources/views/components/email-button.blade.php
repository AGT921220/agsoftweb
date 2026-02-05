@props([
    'subject' => null,
    'body' => null,
    'label' => 'Enviar correo',
    'size' => 'lg',
    'class' => '',
    'tracking' => 'email_button',
])

@php
    $emailConfig = config('contact.email');
    $email = $emailConfig['address'];
    $defaultSubject = $emailConfig['subject'];
    $defaultBody = $emailConfig['body'];
    $subject = $subject ?? $defaultSubject;
    $body = $body ?? $defaultBody;
    $encodedSubject = rawurlencode($subject);
    $encodedBody = rawurlencode($body);
    $url = "mailto:{$email}?subject={$encodedSubject}&body={$encodedBody}";
@endphp

<a 
    href="{{ $url }}" 
    class="btn btn-primary btn-{{ $size }} {{ $class }}"
    data-tracking="{{ $tracking }}">
    <i class="fas fa-envelope me-2"></i>{{ $label }}
</a>
