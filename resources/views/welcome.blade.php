@extends('components.base')

@section('title', 'GlobeTrottle — Bespoke Travel Planning & Booking')
@section('meta_description', 'GlobeTrottle plans and books personalised holidays, flights and travel packages. ABTA/ATOL protected. Get a tailored quote from our travel experts today.')
@section('canonical', route('index'))

@section('structured_data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TravelAgency',
    'name' => 'GlobeTrottle',
    'url' => route('index'),
    'logo' => asset('images/global-throthlelogo-new.png'),
    'image' => asset('images/global-throthlelogo-new.png'),
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endsection

@section('content')
       <!-- Hero Section -->
       {{-- @include('components.second-hero') --}}
    @include('components.hero')

    <!--- popular Destination-->
    @include('components.popular-destination')

    @include('components.how-it-works')

        <!--- About us--->
    @include('components.about-us')

    @include('components.make-a-booking')


@endsection