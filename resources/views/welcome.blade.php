@extends('components.base')

@section('content')
       <!-- Hero Section -->
    @include('components.hero')

    <!--- popular Destination-->
    @include('components.popular-destination')

        <!--- About us--->
    @include('components.about-us')


    <!--- contact booking form-->
    @include('components.contact-booking')
    
    <!--- Book a trip-->
    @include('components.book-a-trip')

 

    <!--Blog--->
    @include('components.blog')


@endsection