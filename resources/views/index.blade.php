{{-- resources/views/index.blade.php --}}
@extends('layouts.app')

@section('content')
  {{-- Hero Section --}}
  @include('partials.hero')

  {{-- Services Section --}}
  @include('partials.services')

  {{-- Clients Section --}}
  @include('partials.clients')

  {{-- Projects Section --}}
  {{-- @include('partials.projects') --}}

  {{-- Benefits Section --}}
  @include('partials.benefits')

  {{-- About Us Section --}}
  @include('partials.about')

  {{-- Why Choose Us Section --}}
  @include('partials.why-choose-us')

  {{-- FAQ Section --}}
  {{-- @include('partials.faq') --}}

  {{-- Contact Section --}}
  @include('partials.contact')
@endsection
