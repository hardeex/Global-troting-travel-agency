@extends('components.base')

@section('content')
       <!-- Hero Section -->
       {{-- @include('components.second-hero') --}}
    @include('components.hero')

    <!--- popular Destination-->
    @include('components.popular-destination')
{{-- 
    @include('components.location-served') --}}


    @include('components.how-it-works')

        <!--- About us--->
    @include('components.about-us')

    @include('components.make-a-booking')


    <!--- contact booking form-->
    {{-- @include('components.contact-booking') --}}

   


@endsection