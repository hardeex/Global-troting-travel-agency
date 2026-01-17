@extends('components.base')
@section('title', 'Service Not Available - Globe Trotting Travel UK')

@section('content')
<div class="min-h-screen  flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-blue-100 px-4 py-12">
    <div class="max-w-2xl w-full">
        <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 mt-12 border border-blue-100">
            <!-- Icon -->
            <div class="flex justify-center mb-6">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Heading -->
            <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">
                Service Not Available
            </h1>

            <!-- Subtitle -->
            <p class="text-lg text-center text-gray-600 mb-6">
                We're currently only serving UK travellers
            </p>

            <!-- Main Message -->
            <div class="bg-blue-50 border-l-4 border-blue-600 p-6 mb-6 rounded-r-lg">
                <p class="text-gray-700 leading-relaxed">
                    <strong class="text-blue-900">Globe Trotting Travel UK</strong> is exclusively available to users in the United Kingdom. Our services, packages, and offerings are tailored specifically for UK residents.
                </p>
            </div>

            <!-- Location Info -->
            <div class="bg-gray-50 rounded-lg p-5 mb-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <span class="text-gray-600 font-medium">Detected Location:</span>
                    <span class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-semibold text-gray-800">
                        {{ $country ?? 'Unknown' }}
                    </span>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="text-center space-y-4">
                <p class="text-gray-600">
                    If you believe this is an error or you're using a VPN, please get in touch.
                </p>
                
                <a href="mailto:support@globetrottingtraveluk.com" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact Support
                </a>
            </div>

            <!-- Footer Note -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm text-center text-gray-500">
                    Looking to travel from the UK? Visit us from a UK location or contact our team for assistance.
                </p>
            </div>
        </div>

        <!-- Additional Help -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Using a VPN? 
                <span class="text-blue-600 font-medium">Try disabling it and refresh the page</span>
            </p>
        </div>
    </div>
</div>
@endsection