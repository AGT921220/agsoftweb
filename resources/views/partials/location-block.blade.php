{{-- Bloque reutilizable de ubicación (Contacto + Footer). NAP consistente, link a Google Maps. --}}
@php
    $address = config('site.contact.address');
    $mapsUrl = config('site.contact.maps_url');
@endphp
<div class="location-block">
    <p class="mb-1">
        <i class="fas fa-map-marker-alt" role="img" aria-hidden="true"></i>
        <span class="visually-hidden">Ubicación:</span>
        {{ $address }}
    </p>
    @if($mapsUrl)
        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="location-maps-link"
           aria-label="Abrir ubicación en Google Maps">
            Abrir en Google Maps
            <i class="fas fa-external-link-alt ms-1" aria-hidden="true"></i>
        </a>
    @endif
</div>
