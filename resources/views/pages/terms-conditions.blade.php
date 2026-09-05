@extends('components.base')
@section('title', 'Terms & Conditions — GlobeTrottle')
@section('meta_description', 'Terms and conditions for booking travel services with GlobeTrottle, including payment, cancellation, and ABTA/ATOL protection information.')
@section('canonical', route('terms.conditions'))

@section('content')

<div class="bg-gradient-to-br from-blue-50 to-indigo-50 py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Terms &amp; Conditions</h1>
            <p class="text-xl text-gray-600">Last updated: {{ now()->format('F Y') }}</p>
        </div>

        <!-- Legal review notice -->
        <div class="bg-amber-50 border-l-4 border-amber-400 p-6 rounded mb-10">
            <div class="flex">
                <svg class="w-6 h-6 text-amber-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <div>
                    <h3 class="font-semibold text-amber-900 mb-1">Placeholder content — legal review required</h3>
                    <p class="text-amber-800 text-sm">
                        The sections below are generic, standard-form travel-agency terms intended as a structural starting point.
                        They have <strong>not</strong> been drafted or reviewed by a solicitor or by ABTA, and must not be relied upon
                        as binding terms for real bookings until reviewed and approved. Replace this notice once the final, reviewed
                        text is in place.
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">

            <section class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Introduction</h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>These terms and conditions govern your use of the GlobeTrottle website and any booking made with us. By making a booking or enquiry through this website, you agree to be bound by these terms.</p>
                </div>
            </section>

            <hr class="my-12 border-gray-200">

            <section id="bookings-payment" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Bookings &amp; Payment</h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>A booking is confirmed once we have received your required deposit or full payment and issued written confirmation. All prices are subject to availability and may change until a booking is confirmed. The balance of any booking must be paid by the due date specified at the time of booking; failure to do so may result in cancellation of your booking and loss of deposit.</p>
                </div>
            </section>

            <hr class="my-12 border-gray-200">

            <section id="cancellations" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Cancellations &amp; Refunds</h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>Cancellation requests must be made in writing. Cancellation charges apply on a sliding scale depending on how close to the departure date the cancellation is made, as set out in your booking confirmation. Some third-party suppliers (airlines, hotels, tour operators) may apply their own non-refundable terms regardless of our own cancellation policy.</p>
                </div>
            </section>

            <hr class="my-12 border-gray-200">

            <section id="abta-atol" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">ABTA &amp; ATOL Financial Protection</h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>Where applicable, the flights and flight-inclusive holidays we arrange are financially protected by the ATOL scheme. When you pay, you will be supplied with an ATOL Certificate confirming what is protected, where you can get information on what this means for you, and who to contact if things go wrong. Non-flight holiday and travel arrangements may be protected under our ABTA membership. Please ask us to confirm the specific financial protection that applies to your booking.</p>
                </div>
            </section>

            <hr class="my-12 border-gray-200">

            <section id="liability" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Liability</h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>We act as an agent in arranging travel services provided by independent third-party suppliers (airlines, hotels, tour operators, transport providers). Except where required by law or where we are found to be at fault, we are not liable for the acts or omissions of these third-party suppliers or for events outside our reasonable control.</p>
                </div>
            </section>

            <hr class="my-12 border-gray-200">

            <section id="complaints" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Complaints</h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>If you have a complaint about any part of your booking, please raise it with the relevant supplier at the time, where possible, and notify us as soon as reasonably practicable. You can contact us at <a href="mailto:support@globetrottingtraveluk.com" class="text-blue-600 hover:underline">support@globetrottingtraveluk.com</a>.</p>
                </div>
            </section>

            <hr class="my-12 border-gray-200">

            <section id="governing-law" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Governing Law</h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>These terms are governed by the laws of England and Wales, and any disputes will be subject to the exclusive jurisdiction of the courts of England and Wales.</p>
                </div>
            </section>

        </div>

        <!-- Footer Note -->
        <div class="text-center mt-12 text-gray-600">
            <p class="text-sm">If you have any questions about these terms, please contact us at <a href="mailto:support@globetrottingtraveluk.com" class="text-blue-600 hover:underline">support@globetrottingtraveluk.com</a></p>
        </div>
    </div>
</div>

@endsection
