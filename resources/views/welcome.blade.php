@extends('components.base')

@section('content')
       <!-- Hero Section -->
    @include('components.hero')

    <!--- popular Destination-->
    @include('components.popular-destination')

        <!--- About us--->
    @include('components.about-us')


    <!--- Book a trip-->
    @include('components.book-a-trip')

 

    <!--Blog--->
    @include('components.blog')


@endsection