@extends('components.base')
@section('title', 'Privacy Policy | Globe Trotting')

@section('content')
    <div class="relative min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">

        <!-- Header Section with Background -->
        <div class="relative bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900 text-white py-20">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-10 left-10 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl"></div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-white/10 backdrop-blur-lg rounded-2xl mb-6 border border-white/20">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Privacy Policy</h1>
                    <p class="text-lg text-blue-100 mb-6">Last updated: {{ date('F d, Y') }}</p>
                    <p class="text-blue-100 max-w-2xl mx-auto">
                        Globe Trotting respects your privacy and is committed to protecting your personal data.
                        This privacy policy will inform you how we handle your information and your privacy rights.
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                    <!-- Table of Contents (Sidebar) -->
                    <div class="lg:col-span-1">
                        <div class="lg:sticky lg:top-6">
                            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                    Quick Navigation
                                </h3>
                                <nav class="space-y-2">
                                    <a href="#introduction"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Introduction
                                    </a>
                                    <a href="#controller"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Who We Are
                                    </a>
                                    <a href="#data-collected"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Data We Collect
                                    </a>
                                    <a href="#data-collection"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        How Data is Collected
                                    </a>
                                    <a href="#data-usage"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        How We Use Data
                                    </a>
                                    <a href="#marketing"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Marketing
                                    </a>
                                    <a href="#disclosures"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Data Disclosures
                                    </a>
                                    <a href="#security"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Data Security
                                    </a>
                                    <a href="#retention"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Data Retention
                                    </a>
                                    <a href="#your-rights"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Your Legal Rights
                                    </a>
                                    <a href="#cookies"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Cookies
                                    </a>
                                    <a href="#contact"
                                        class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                        Contact DPO
                                    </a>
                                </nav>

                                <!-- Help Box -->
                                <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                            </path>
                                        </svg>
                                        <div>
                                            <h4 class="font-semibold text-blue-900 text-sm mb-1">Data Protection</h4>
                                            <p class="text-xs text-blue-700 mb-2">Questions about your data?</p>
                                            <a href="mailto:dpo@globetrotting.com"
                                                class="text-xs text-blue-600 hover:text-blue-800 font-semibold">
                                                Contact our DPO →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Area -->
                    <div class="lg:col-span-3">
                        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-gray-100">

                            <!-- Introduction -->
                            <section id="introduction" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <span class="text-blue-600 font-bold text-xl">📋</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Introduction</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        Welcome to Globe Trotting's privacy policy. Globe Trotting respects your privacy and
                                        is committed to
                                        protecting your personal data. This privacy policy will inform you as to how we look
                                        after your personal
                                        data and tell you about your privacy rights and how the law protects you.
                                    </p>
                                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                                        <p class="text-sm text-blue-800">
                                            <strong class="font-semibold">Important:</strong> This website is not intended
                                            for children and we
                                            do not knowingly collect data relating to children. Please read this privacy
                                            policy together with
                                            any other privacy notices we may provide.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Controller -->
                            <section id="controller" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <span class="text-purple-600 font-bold text-xl">🏢</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Who We Are</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        Globe Trotting Ltd is the controller and responsible for this website. We have
                                        appointed a data
                                        protection officer (DPO) who is responsible for overseeing questions in relation to
                                        this privacy policy.
                                    </p>
                                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                                        <h4 class="font-semibold text-gray-900 mb-4">Data Protection Officer Contact</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="space-y-2">
                                                <div class="flex items-start gap-3">
                                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <div>
                                                        <p class="text-xs text-gray-500">Email</p>
                                                        <p class="text-sm font-medium text-gray-900">dpo@globetrotting.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <div class="flex items-start gap-3">
                                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                        </path>
                                                    </svg>
                                                    <div>
                                                        <p class="text-xs text-gray-500">Phone</p>
                                                        <p class="text-sm font-medium text-gray-900">+44 XXX XXX XXXX</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg">
                                        <p class="text-sm text-amber-800">
                                            <strong class="font-semibold">Your Rights:</strong> You have the right to make
                                            a complaint at any
                                            time to the Information Commissioner's Office (ICO), the UK supervisory
                                            authority for data protection
                                            issues at <a href="https://ico.org.uk"
                                                class="text-amber-900 underline">www.ico.org.uk</a>.
                                            However, we would appreciate the chance to deal with your concerns before you
                                            approach the ICO.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Data Collected -->
                            <section id="data-collected" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <span class="text-green-600 font-bold text-xl">📊</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">The Data We Collect About You</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        Personal data means any information about an individual from which that person can
                                        be identified.
                                        We may collect, use, store and transfer different kinds of personal data about you:
                                    </p>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <!-- Identity Data -->
                                        <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                <h4 class="font-semibold text-blue-900 text-sm">Identity Data</h4>
                                            </div>
                                            <p class="text-xs text-blue-800">Name, title, date of birth, gender, passport
                                                information</p>
                                        </div>

                                        <!-- Contact Data -->
                                        <div class="bg-purple-50 rounded-xl p-4 border border-purple-200">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <h4 class="font-semibold text-purple-900 text-sm">Contact Data</h4>
                                            </div>
                                            <p class="text-xs text-purple-800">Address, email, telephone numbers</p>
                                        </div>

                                        <!-- Financial Data -->
                                        <div class="bg-green-50 rounded-xl p-4 border border-green-200">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                                    </path>
                                                </svg>
                                                <h4 class="font-semibold text-green-900 text-sm">Financial Data</h4>
                                            </div>
                                            <p class="text-xs text-green-800">Bank account and payment card details</p>
                                        </div>

                                        <!-- Transaction Data -->
                                        <div class="bg-amber-50 rounded-xl p-4 border border-amber-200">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                                    </path>
                                                </svg>
                                                <h4 class="font-semibold text-amber-900 text-sm">Transaction Data</h4>
                                            </div>
                                            <p class="text-xs text-amber-800">Payment details and purchase history</p>
                                        </div>

                                        <!-- Technical Data -->
                                        <div class="bg-cyan-50 rounded-xl p-4 border border-cyan-200">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <h4 class="font-semibold text-cyan-900 text-sm">Technical Data</h4>
                                            </div>
                                            <p class="text-xs text-cyan-800">IP address, browser type, device information
                                            </p>
                                        </div>

                                        <!-- Usage Data -->
                                        <div class="bg-pink-50 rounded-xl p-4 border border-pink-200">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                    </path>
                                                </svg>
                                                <h4 class="font-semibold text-pink-900 text-sm">Usage Data</h4>
                                            </div>
                                            <p class="text-xs text-pink-800">How you use our website and services</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- How Data is Collected -->
                            <section id="data-collection" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                        <span class="text-indigo-600 font-bold text-xl">🔍</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">How Your Personal Data is Collected</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        We use different methods to collect data from and about you including:
                                    </p>

                                    <div class="space-y-4">
                                        <div class="border-l-4 border-blue-500 bg-blue-50 p-4 rounded-r-lg">
                                            <h4 class="font-semibold text-blue-900 mb-2 flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Direct Interactions
                                            </h4>
                                            <p class="text-sm text-blue-800 mb-2">You may give us data when you:</p>
                                            <ul class="space-y-1 text-sm text-blue-800 ml-7">
                                                <li>• Create an account on our website</li>
                                                <li>• Subscribe to our marketing communications</li>
                                                <li>• Request or purchase our products/services</li>
                                                <li>• Enter a competition or promotion</li>
                                                <li>• Contact us with enquiries or feedback</li>
                                            </ul>
                                        </div>

                                        <div class="border-l-4 border-purple-500 bg-purple-50 p-4 rounded-r-lg">
                                            <h4 class="font-semibold text-purple-900 mb-2 flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Automated Technologies
                                            </h4>
                                            <p class="text-sm text-purple-800">
                                                As you interact with our website, we automatically collect Technical Data
                                                about your equipment,
                                                browsing actions and patterns using cookies, server logs and similar
                                                technologies.
                                            </p>
                                        </div>

                                        <div class="border-l-4 border-green-500 bg-green-50 p-4 rounded-r-lg">
                                            <h4 class="font-semibold text-green-900 mb-2 flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                                    </path>
                                                </svg>
                                                Third Parties
                                            </h4>
                                            <p class="text-sm text-green-800 mb-2">We may receive data from:</p>
                                            <ul class="space-y-1 text-sm text-green-800 ml-7">
                                                <li>• Analytics providers (e.g., Google Analytics)</li>
                                                <li>• Payment service providers</li>
                                                <li>• Travel supplier partners</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- How We Use Data -->
                            <section id="data-usage" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <span class="text-orange-600 font-bold text-xl">⚙️</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">How We Use Your Personal Data</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        We will only use your personal data when the law allows us to. Most commonly, we
                                        will use your
                                        personal data in the following circumstances:
                                    </p>

                                    <div
                                        class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-200">
                                        <h4 class="font-semibold text-blue-900 mb-4">Lawful Bases for Processing</h4>
                                        <div class="space-y-3">
                                            <div class="flex items-start gap-3">
                                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-sm text-blue-800">
                                                    <strong class="font-semibold">Performance of Contract:</strong> To
                                                    provide services you've requested
                                                </p>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-sm text-blue-800">
                                                    <strong class="font-semibold">Legitimate Interests:</strong> To improve
                                                    our services and provide you with relevant offers
                                                </p>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-sm text-blue-800">
                                                    <strong class="font-semibold">Legal Obligation:</strong> To comply with
                                                    legal and regulatory requirements
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Marketing -->
                            <section id="marketing" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center">
                                        <span class="text-pink-600 font-bold text-xl">📢</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Marketing Communications</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        We may use your Identity, Contact, Technical, Usage and Profile Data to form a view
                                        on what we think
                                        you may want or need, or what may be of interest to you.
                                    </p>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                            <h4 class="font-semibold text-green-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Opt-In
                                            </h4>
                                            <p class="text-sm text-green-800">
                                                Sign up to receive marketing about our latest travel deals, destinations,
                                                and exclusive offers.
                                            </p>
                                        </div>

                                        <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                            <h4 class="font-semibold text-red-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Opt-Out
                                            </h4>
                                            <p class="text-sm text-red-800">
                                                You can unsubscribe at any time by clicking the unsubscribe link in our
                                                emails or contacting us directly.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                                        <p class="text-sm text-blue-800">
                                            <strong class="font-semibold">Third-Party Marketing:</strong> We will get your
                                            express opt-in consent
                                            before we share your personal data with any third party for marketing purposes.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Disclosures -->
                            <section id="disclosures" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                                        <span class="text-cyan-600 font-bold text-xl">🔗</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Disclosures of Your Personal Data</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        We may share your personal data with:
                                    </p>

                                    <div class="space-y-3">
                                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                                </path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Business Partners & Suppliers
                                                </p>
                                                <p class="text-xs text-gray-600">For the performance of our services</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Service Providers</p>
                                                <p class="text-xs text-gray-600">Payment processors, analytics providers,
                                                    technology partners</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Legal Obligations</p>
                                                <p class="text-xs text-gray-600">When required by law or to protect our
                                                    rights</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                                        <p class="text-sm text-red-800">
                                            <strong class="font-semibold">Important:</strong> We will never sell your data
                                            to third parties for marketing purposes.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Security -->
                            <section id="security" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                        <span class="text-red-600 font-bold text-xl">🔒</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Data Security</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        We have put in place appropriate security measures to prevent your personal data
                                        from being accidentally
                                        lost, used or accessed in an unauthorised way, altered or wrongfully disclosed.
                                    </p>

                                    <div
                                        class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-200">
                                        <h4 class="font-semibold text-green-900 mb-3 flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Our Security Measures Include:
                                        </h4>
                                        <ul class="space-y-2 text-sm text-green-800">
                                            <li class="flex items-start gap-2">
                                                <span class="text-green-600">•</span>
                                                Encryption of sensitive data in transit and at rest
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <span class="text-green-600">•</span>
                                                Limited access to personal data on a need-to-know basis
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <span class="text-green-600">•</span>
                                                Regular security assessments and updates
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <span class="text-green-600">•</span>
                                                Procedures to deal with suspected data breaches
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Retention -->
                            <section id="retention" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                                        <span class="text-amber-600 font-bold text-xl">⏱️</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Data Retention</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        We will only retain your personal data for as long as reasonably necessary to fulfil
                                        the purposes we
                                        collected it for, including for the purposes of satisfying any legal, regulatory,
                                        tax, accounting or
                                        reporting requirements.
                                    </p>

                                    <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                                        <p class="text-sm text-blue-800 leading-relaxed">
                                            <strong class="font-semibold">Retention Period:</strong> By law, we have to
                                            keep basic information
                                            about our customers (including Contact, Identity, Financial and Transaction
                                            Data) for six years after
                                            they cease being customers for tax purposes.
                                        </p>
                                    </div>

                                    <p class="text-gray-700 leading-relaxed">
                                        In some circumstances we will anonymise your personal data so that it can no longer
                                        be associated with you,
                                        in which case we may use this information indefinitely without further notice to
                                        you.
                                    </p>
                                </div>
                            </section>

                            <!-- Your Rights -->
                            <section id="your-rights" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center">
                                        <span class="text-slate-600 font-bold text-xl">⚖️</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Your Legal Rights</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        Under data protection laws, you have rights including:
                                    </p>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div
                                            class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200">
                                            <h4 class="font-semibold text-blue-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Request Access
                                            </h4>
                                            <p class="text-xs text-blue-800">Request a copy of your personal data</p>
                                        </div>

                                        <div
                                            class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200">
                                            <h4 class="font-semibold text-purple-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                                Request Correction
                                            </h4>
                                            <p class="text-xs text-purple-800">Correct inaccurate or incomplete data</p>
                                        </div>

                                        <div
                                            class="bg-gradient-to-br from-red-50 to-red-100 rounded-xl p-4 border border-red-200">
                                            <h4 class="font-semibold text-red-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Request Erasure
                                            </h4>
                                            <p class="text-xs text-red-800">Delete your personal data</p>
                                        </div>

                                        <div
                                            class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-4 border border-amber-200">
                                            <h4 class="font-semibold text-amber-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Object to Processing
                                            </h4>
                                            <p class="text-xs text-amber-800">Object to certain uses of your data</p>
                                        </div>

                                        <div
                                            class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 border border-green-200">
                                            <h4 class="font-semibold text-green-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Request Restriction
                                            </h4>
                                            <p class="text-xs text-green-800">Limit how we use your data</p>
                                        </div>

                                        <div
                                            class="bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-xl p-4 border border-cyan-200">
                                            <h4 class="font-semibold text-cyan-900 text-sm mb-2 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
                                                    </path>
                                                </svg>
                                                Data Portability
                                            </h4>
                                            <p class="text-xs text-cyan-800">Transfer your data to another service</p>
                                        </div>
                                    </div>

                                    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                                        <p class="text-sm text-green-800">
                                            <strong class="font-semibold">No Fee Required:</strong> You will not have to
                                            pay a fee to exercise
                                            any of these rights. We aim to respond to all legitimate requests within one
                                            month.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Cookies -->
                            <section id="cookies" class="mb-12 scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <span class="text-yellow-600 font-bold text-xl">🍪</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Cookies</h2>
                                </div>
                                <div class="pl-13 space-y-4">
                                    <p class="text-gray-700 leading-relaxed">
                                        When you visit our website, we place "cookies" on your device. Cookies are small
                                        data files that help
                                        us recognise you when you return to our website and improve your browsing
                                        experience.
                                    </p>

                                    <div class="bg-amber-50 rounded-xl p-6 border border-amber-200">
                                        <h4 class="font-semibold text-amber-900 mb-3">Cookie Controls</h4>
                                        <p class="text-sm text-amber-800 mb-3">
                                            You can set your browser to refuse all or some cookies, or to alert you when
                                            websites set or access cookies.
                                        </p>
                                        <a href="/cookie-policy"
                                            class="inline-flex items-center gap-2 text-amber-900 hover:text-amber-700 font-semibold text-sm">
                                            Learn more about our Cookie Policy
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </section>

                            <!-- Contact -->
                            <section id="contact" class="scroll-mt-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <span class="text-blue-600 font-bold text-xl">📧</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Contact Our Data Protection Officer</h2>
                                </div>
                                <div class="pl-13">
                                    <div
                                        class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-200">
                                        <h4 class="font-semibold text-blue-900 mb-4">Questions About This Privacy Policy?
                                        </h4>
                                        <p class="text-sm text-blue-800 mb-4">
                                            If you have any questions about this privacy policy or wish to exercise your
                                            legal rights, please contact our Data Protection Officer:
                                        </p>
                                        <div class="space-y-3">
                                            <div class="flex items-center gap-3">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span
                                                    class="text-sm text-blue-900 font-medium">dpo@globetrotting.com</span>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                <span class="text-sm text-blue-900 font-medium">+44 XXX XXX XXXX</span>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="text-sm text-blue-900 font-medium">Globe Trotting Ltd<br>Your
                                                    Address Here<br>City, Postcode, UK</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>

                        <!-- Bottom CTA -->
                        <div
                            class="mt-8 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-2xl p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-3">Your Privacy Matters to Us</h3>
                            <p class="text-blue-100 mb-6">
                                We're committed to protecting your personal data. If you have any concerns, please don't
                                hesitate to contact us.
                            </p>
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                                <a href="/"
                                    class="inline-flex items-center gap-2 bg-white text-blue-600 font-bold px-8 py-3 rounded-xl hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                    Back to Home
                                </a>
                                <a href="/terms-and-conditions"
                                    class="inline-flex items-center gap-2 border-2 border-white text-white font-bold px-8 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                                    View Terms & Conditions
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Highlight active section in navigation
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop - 100) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('bg-blue-100', 'text-blue-600', 'font-semibold');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('bg-blue-100', 'text-blue-600', 'font-semibold');
                }
            });
        });
    </script>

    <style>
        .scroll-mt-6 {
            scroll-margin-top: 1.5rem;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>

@endsection
