<section class="relative py-16 px-4 sm:py-20 sm:px-6 lg:py-24 lg:px-8 overflow-hidden bg-white">
    <style>
        @keyframes htw-fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .htw-fade-in {
            animation: htw-fade-in-up 0.8s ease-out forwards;
        }

        .htw-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .htw-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }
    </style>

    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-72 h-72 bg-cyan-100/40 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-100/40 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Section Header -->
        <div class="text-center mb-16 htw-fade-in">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-4">
                How It
                <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Works</span>
            </h2>
            <p class="text-lg sm:text-xl text-slate-600 max-w-2xl mx-auto">
                From your first message to touching down, here's how we plan your perfect trip
            </p>
        </div>

        <!-- Steps -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Step 1 -->
            <div class="htw-card bg-white rounded-3xl p-8 border border-slate-100 shadow-sm relative" style="animation-delay: 0.1s">
                <div class="text-sm font-bold text-cyan-600 mb-4">STEP 01</div>
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Tell Us Your Dream Trip</h3>
                <p class="text-slate-600 leading-relaxed">
                    Share your destination, dates, and budget through our quick enquiry form — takes less than a minute.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="htw-card bg-white rounded-3xl p-8 border border-slate-100 shadow-sm relative" style="animation-delay: 0.2s">
                <div class="text-sm font-bold text-cyan-600 mb-4">STEP 02</div>
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Get a Personalised Quote</h3>
                <p class="text-slate-600 leading-relaxed">
                    One of our travel experts puts together a tailored itinerary and price that fits your plans.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="htw-card bg-white rounded-3xl p-8 border border-slate-100 shadow-sm relative" style="animation-delay: 0.3s">
                <div class="text-sm font-bold text-cyan-600 mb-4">STEP 03</div>
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Book with Confidence</h3>
                <p class="text-slate-600 leading-relaxed">
                    Confirm your booking securely, protected under our ABTA and ATOL membership every step of the way.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="htw-card bg-white rounded-3xl p-8 border border-slate-100 shadow-sm relative" style="animation-delay: 0.4s">
                <div class="text-sm font-bold text-cyan-600 mb-4">STEP 04</div>
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center shadow-lg mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 16v-2a4 4 0 00-4-4H8m0 0l3-3m-3 3l3 3m9 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h1"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Travel &amp; Enjoy</h3>
                <p class="text-slate-600 leading-relaxed">
                    Sit back and enjoy the trip — our team is on call with 24/7 support from departure to landing.
                </p>
            </div>
        </div>
    </div>
</section>
