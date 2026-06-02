@extends('components.base')
@section('title', 'Terms and Conditions | Globe Trotting')

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
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/10 backdrop-blur-lg rounded-2xl mb-6 border border-white/20">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Terms and Conditions</h1>
                <p class="text-lg text-blue-100 mb-6">Last updated: {{ date('F d, Y') }}</p>
                <p class="text-blue-100 max-w-2xl mx-auto">
                    Please read these terms and conditions carefully before using our services. 
                    By accessing our website, you agree to be bound by these terms.
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
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                Quick Navigation
                            </h3>
                            <nav class="space-y-2">
                                <a href="#introduction" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Introduction
                                </a>
                                <a href="#who-we-are" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Who We Are
                                </a>
                                <a href="#acceptance" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Acceptance of Terms
                                </a>
                                <a href="#changes" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Changes to Terms
                                </a>
                                <a href="#account-security" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Account Security
                                </a>
                                <a href="#intellectual-property" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Intellectual Property
                                </a>
                                <a href="#user-content" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    User Content
                                </a>
                                <a href="#liability" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Liability
                                </a>
                                <a href="#privacy" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Privacy Policy
                                </a>
                                <a href="#governing-law" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Governing Law
                                </a>
                                <a href="#contact" class="block text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    Contact Us
                                </a>
                            </nav>

                            <!-- Help Box -->
                            <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-blue-900 text-sm mb-1">Need Help?</h4>
                                        <p class="text-xs text-blue-700 mb-2">Have questions about our terms?</p>
                                        <a href="/contact" class="text-xs text-blue-600 hover:text-blue-800 font-semibold">
                                            Contact Support →
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
                                    <span class="text-blue-600 font-bold">📋</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">What's in These Terms?</h2>
                            </div>
                            <div class="pl-13">
                                <p class="text-gray-700 leading-relaxed">
                                    These terms and conditions outline the rules and regulations for the use of Globe Trotting's website, 
                                    located at globetrotting.com. By accessing this website, we assume you accept these terms and conditions. 
                                    Do not continue to use Globe Trotting if you do not agree to all of the terms and conditions stated on this page.
                                </p>
                            </div>
                        </section>

                        <!-- Who We Are -->
                        <section id="who-we-are" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <span class="text-purple-600 font-bold">🏢</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Who We Are and How to Contact Us</h2>
                            </div>
                            <div class="pl-13 space-y-4">
                                <p class="text-gray-700 leading-relaxed">
                                    Globe Trotting is operated by Globe Trotting Ltd ("We"). We are registered in England and Wales 
                                    under company number XXXXXXX and have our registered office at [Your Address].
                                </p>
                                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <h4 class="font-semibold text-gray-900 text-sm mb-2">Company Information</h4>
                                            <p class="text-sm text-gray-600">Company No: XXXXXXX</p>
                                            <p class="text-sm text-gray-600">VAT No: XXXXXXXXX</p>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 text-sm mb-2">Contact Us</h4>
                                            <p class="text-sm text-gray-600">Email: support@globetrotting.com</p>
                                            <p class="text-sm text-gray-600">Phone: +44 XXX XXX XXXX</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Acceptance of Terms -->
                        <section id="acceptance" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <span class="text-green-600 font-bold">✓</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">By Using Our Site You Accept These Terms</h2>
                            </div>
                            <div class="pl-13 space-y-4">
                                <p class="text-gray-700 leading-relaxed">
                                    By using our site, you confirm that you accept these terms of use and that you agree to comply with them. 
                                    If you do not agree to these terms, you must not use our site. We recommend that you print a copy of these 
                                    terms for future reference.
                                </p>
                                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                                    <h4 class="font-semibold text-blue-900 text-sm mb-2">Additional Terms That May Apply</h4>
                                    <ul class="space-y-2 text-sm text-blue-800">
                                        <li class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Our Privacy Policy
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Our Acceptable Use Policy
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Our Booking Terms and Conditions
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <!-- Changes to Terms -->
                        <section id="changes" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                                    <span class="text-amber-600 font-bold">🔄</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">We May Make Changes to These Terms</h2>
                            </div>
                            <div class="pl-13">
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    We may amend these terms from time to time. Every time you wish to use our site, please check these terms 
                                    to ensure you understand the terms that apply at that time.
                                </p>
                                <p class="text-gray-700 leading-relaxed">
                                    We may also update and change our site from time to time to reflect changes to our products, our users' 
                                    needs, and our business priorities.
                                </p>
                            </div>
                        </section>

                        <!-- Account Security -->
                        <section id="account-security" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                    <span class="text-red-600 font-bold">🔒</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">You Must Keep Your Account Details Safe</h2>
                            </div>
                            <div class="pl-13 space-y-4">
                                <p class="text-gray-700 leading-relaxed">
                                    If you choose, or you are provided with, a user identification code, password, or any other piece of 
                                    information as part of our security procedures, you must treat such information as confidential.
                                </p>
                                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                                    <h4 class="font-semibold text-red-900 text-sm mb-2">Important Security Notice</h4>
                                    <ul class="space-y-2 text-sm text-red-800">
                                        <li class="flex items-start gap-2">
                                            <span class="text-red-600 font-bold">•</span>
                                            You must not disclose your login details to any third party
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-red-600 font-bold">•</span>
                                            We may disable any account if we believe these terms have been violated
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-red-600 font-bold">•</span>
                                            If you suspect unauthorized access, notify us immediately
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <!-- Intellectual Property -->
                        <section id="intellectual-property" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                    <span class="text-indigo-600 font-bold">©</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">How You May Use Material on Our Site</h2>
                            </div>
                            <div class="pl-13 space-y-4">
                                <p class="text-gray-700 leading-relaxed">
                                    We are the owner or the licensee of all intellectual property rights in our site, and in the material 
                                    published on it. Those works are protected by copyright laws and treaties around the world. All such 
                                    rights are reserved.
                                </p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                        <h4 class="font-semibold text-green-900 text-sm mb-2 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            You May
                                        </h4>
                                        <ul class="space-y-1 text-sm text-green-800">
                                            <li>• Print pages for personal use</li>
                                            <li>• Download extracts for personal use</li>
                                            <li>• Share content within your organization</li>
                                        </ul>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                        <h4 class="font-semibold text-red-900 text-sm mb-2 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                            </svg>
                                            You Must Not
                                        </h4>
                                        <ul class="space-y-1 text-sm text-red-800">
                                            <li>• Modify any downloaded materials</li>
                                            <li>• Use content for commercial purposes</li>
                                            <li>• Remove copyright notices</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- User Content -->
                        <section id="user-content" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                                    <span class="text-cyan-600 font-bold">👤</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">User-Generated Content</h2>
                            </div>
                            <div class="pl-13 space-y-4">
                                <p class="text-gray-700 leading-relaxed">
                                    This website may include information and materials uploaded by other users of the site, including to 
                                    reviews, comments, and forums. This information and these materials have not been verified or approved by us.
                                </p>
                                <p class="text-gray-700 leading-relaxed">
                                    When you upload content to our site, you grant us a limited license to use, store, and copy that content 
                                    and to distribute and make it available to third parties. You retain all ownership rights in your content.
                                </p>
                            </div>
                        </section>

                        <!-- Liability -->
                        <section id="liability" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <span class="text-orange-600 font-bold">⚠️</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Our Responsibility for Loss or Damage</h2>
                            </div>
                            <div class="pl-13 space-y-4">
                                <p class="text-gray-700 leading-relaxed">
                                    We do not exclude or limit in any way our liability to you where it would be unlawful to do so. This 
                                    includes liability for death or personal injury caused by our negligence or the negligence of our 
                                    employees, agents, or subcontractors and for fraud or fraudulent misrepresentation.
                                </p>
                                <div class="bg-amber-50 rounded-xl p-6 border border-amber-200">
                                    <h4 class="font-semibold text-amber-900 mb-3">Disclaimer</h4>
                                    <p class="text-sm text-amber-800 leading-relaxed">
                                        The content on our site is provided for general information only. It is not intended to amount to 
                                        advice on which you should rely. You must obtain professional or specialist advice before taking, 
                                        or refraining from, any action on the basis of the content on our site.
                                    </p>
                                </div>
                            </div>
                        </section>

                        <!-- Privacy -->
                        <section id="privacy" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center">
                                    <span class="text-pink-600 font-bold">🔐</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">How We Use Your Personal Information</h2>
                            </div>
                            <div class="pl-13 space-y-4">
                                <p class="text-gray-700 leading-relaxed">
                                    We will only use your personal information as set out in our Privacy Policy. Please review our Privacy 
                                    Policy to understand how we collect, use, and protect your personal data.
                                </p>
                                <a href="/privacy-policy" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold group">
                                    Read our Privacy Policy
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </section>

                        <!-- Governing Law -->
                        <section id="governing-law" class="mb-12 scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center">
                                    <span class="text-slate-600 font-bold">⚖️</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Governing Law and Jurisdiction</h2>
                            </div>
                            <div class="pl-13">
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    These terms of use, their subject matter, and their formation are governed by English law. You and we 
                                    both agree that the courts of England and Wales will have exclusive jurisdiction.
                                </p>
                                <p class="text-gray-700 leading-relaxed">
                                    If you are a resident of Northern Ireland, you may also bring proceedings in Northern Ireland, and if 
                                    you are a resident of Scotland, you may also bring proceedings in Scotland.
                                </p>
                            </div>
                        </section>

                        <!-- Contact -->
                        <section id="contact" class="scroll-mt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <span class="text-blue-600 font-bold">📧</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Contact Information</h2>
                            </div>
                            <div class="pl-13">
                                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-200">
                                    <h4 class="font-semibold text-blue-900 mb-4">Questions About These Terms?</h4>
                                    <p class="text-sm text-blue-800 mb-4">
                                        If you have any questions about these Terms and Conditions, please contact us:
                                    </p>
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-sm text-blue-900 font-medium">support@globetrotting.com</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            <span class="text-sm text-blue-900 font-medium">+44 XXX XXX XXXX</span>
                                        </div>
                                        <div class="flex items-start gap-3">
                                            <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span class="text-sm text-blue-900 font-medium">Globe Trotting Ltd<br>Your Address Here<br>City, Postcode</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                    <!-- Bottom CTA -->
                    <div class="mt-8 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-2xl p-8 text-white text-center">
                        <h3 class="text-2xl font-bold mb-3">Ready to Start Your Journey?</h3>
                        <p class="text-blue-100 mb-6">
                            Now that you've read our terms, explore our amazing travel destinations!
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="/" class="inline-flex items-center gap-2 bg-white text-blue-600 font-bold px-8 py-3 rounded-xl hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Back to Home
                            </a>
                            <a href="/contact" class="inline-flex items-center gap-2 border-2 border-white text-white font-bold px-8 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                                Contact Support
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
    anchor.addEventListener('click', function (e) {
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