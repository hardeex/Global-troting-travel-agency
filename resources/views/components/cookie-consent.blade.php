<!-- Advanced Cookie Consent Banner with Settings -->
<div id="cookieConsent" class="fixed bottom-0 left-0 right-0 z-50 transform translate-y-full transition-transform duration-500 ease-out">
    <div class="bg-white/95 backdrop-blur-lg border-t-4 border-blue-600 shadow-2xl">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Cookie Icon & Message -->
                <div class="flex items-start gap-4 flex-1">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-1">🍪 We Value Your Privacy</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. 
                            <a href="/privacy-policy" class="text-blue-600 hover:text-blue-800 font-semibold underline">Learn more</a>
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3 flex-shrink-0 flex-wrap justify-center">
                    <button onclick="openCookieSettings()" 
                            class="px-4 py-2.5 text-gray-600 hover:text-gray-900 font-semibold transition-colors duration-200 underline">
                        Customize
                    </button>
                    <button onclick="rejectCookies()" 
                            class="px-6 py-2.5 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                        Reject All
                    </button>
                    <button onclick="acceptAllCookies()" 
                            class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Accept All
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cookie Settings Modal -->
<div id="cookieSettingsModal" class="fixed inset-0 z-[60] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeCookieSettings()"></div>
    
    <!-- Modal Content -->
    <div class="relative flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900">Cookie Settings</h2>
                    <button onclick="closeCookieSettings()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-600 mt-2">Manage your cookie preferences</p>
            </div>

            <!-- Cookie Categories -->
            <div class="px-6 py-4 space-y-4">
                <!-- Essential Cookies -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Essential Cookies</h3>
                                <p class="text-xs text-gray-500">Always Active</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold text-gray-600">
                            Required
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">
                        These cookies are necessary for the website to function and cannot be disabled.
                    </p>
                </div>

                <!-- Analytics Cookies -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Analytics Cookies</h3>
                                <p class="text-xs text-gray-500">Optional</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="analyticsCookies" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-600">
                        Help us improve our website by collecting anonymous usage statistics.
                    </p>
                </div>

                <!-- Marketing Cookies -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Marketing Cookies</h3>
                                <p class="text-xs text-gray-500">Optional</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="marketingCookies" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-600">
                        Used to deliver personalized advertisements relevant to your interests.
                    </p>
                </div>

                <!-- Functional Cookies -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Functional Cookies</h3>
                                <p class="text-xs text-gray-500">Optional</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="functionalCookies" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-600">
                        Enable enhanced functionality like live chat, social media features, and personalization.
                    </p>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 px-6 py-4 rounded-b-2xl">
                <div class="flex items-center justify-between gap-3">
                    <button onclick="closeCookieSettings()" 
                            class="px-4 py-2 text-gray-600 hover:text-gray-900 font-semibold transition-colors">
                        Cancel
                    </button>
                    <div class="flex gap-3">
                        <button onclick="saveCustomCookieSettings()" 
                                class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105">
                            Save Preferences
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Check if user has already made a choice
document.addEventListener('DOMContentLoaded', function() {
    const cookieConsent = localStorage.getItem('cookieConsent');
    
    if (!cookieConsent) {
        // Show the banner after a short delay
        setTimeout(() => {
            document.getElementById('cookieConsent').classList.remove('translate-y-full');
        }, 1000);
    } else {
        // User has already made a choice
        const settings = JSON.parse(localStorage.getItem('cookieSettings') || '{}');
        applyCookieSettings(settings);
    }
});

function acceptAllCookies() {
    const settings = {
        essential: true,
        analytics: true,
        marketing: true,
        functional: true
    };
    
    saveCookieConsent('accepted', settings);
    hideBanner();
    applyCookieSettings(settings);
}

function rejectCookies() {
    const settings = {
        essential: true,
        analytics: false,
        marketing: false,
        functional: false
    };
    
    saveCookieConsent('rejected', settings);
    hideBanner();
    applyCookieSettings(settings);
}

function openCookieSettings() {
    document.getElementById('cookieSettingsModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Load saved preferences if any
    const savedSettings = JSON.parse(localStorage.getItem('cookieSettings') || '{}');
    document.getElementById('analyticsCookies').checked = savedSettings.analytics !== false;
    document.getElementById('marketingCookies').checked = savedSettings.marketing === true;
    document.getElementById('functionalCookies').checked = savedSettings.functional !== false;
}

function closeCookieSettings() {
    document.getElementById('cookieSettingsModal').classList.add('hidden');
    document.body.style.overflow = '';
}

function saveCustomCookieSettings() {
    const settings = {
        essential: true,
        analytics: document.getElementById('analyticsCookies').checked,
        marketing: document.getElementById('marketingCookies').checked,
        functional: document.getElementById('functionalCookies').checked
    };
    
    saveCookieConsent('custom', settings);
    closeCookieSettings();
    hideBanner();
    applyCookieSettings(settings);
}

function saveCookieConsent(type, settings) {
    localStorage.setItem('cookieConsent', type);
    localStorage.setItem('cookieSettings', JSON.stringify(settings));
    
    // Optional: Send to server
    fetch('/cookie-consent', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ type, settings })
    }).catch(err => console.log('Cookie consent tracking failed'));
}

function hideBanner() {
    document.getElementById('cookieConsent').classList.add('translate-y-full');
}

function applyCookieSettings(settings) {
    // Analytics Cookies
    if (settings.analytics) {
        console.log('Analytics cookies enabled');
        // Initialize Google Analytics, etc.
        // gtag('consent', 'update', {'analytics_storage': 'granted'});
    } else {
        console.log('Analytics cookies disabled');
        // gtag('consent', 'update', {'analytics_storage': 'denied'});
    }
    
    // Marketing Cookies
    if (settings.marketing) {
        console.log('Marketing cookies enabled');
        // Initialize Facebook Pixel, Google Ads, etc.
        // gtag('consent', 'update', {'ad_storage': 'granted'});
    } else {
        console.log('Marketing cookies disabled');
        // gtag('consent', 'update', {'ad_storage': 'denied'});
    }
    
    // Functional Cookies
    if (settings.functional) {
        console.log('Functional cookies enabled');
        // Enable chat widgets, social media features, etc.
    } else {
        console.log('Functional cookies disabled');
    }
}
</script>