<div id="protectionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-screen overflow-y-auto">
        <div class="p-6 md:p-8">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Consumer Protection</h2>
                        <p class="text-gray-600">Your travel bookings are protected</p>
                    </div>
                </div>
                <button onclick="closeProtectionModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Content -->
            <div class="space-y-6 text-gray-700">
                <!-- Protection Notice -->
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="font-semibold text-green-800">Your Money is Protected</h3>
                    </div>
                    <p class="text-green-700">Your Globe Trotting Agent protects you by never accepting cash or travel
                        payments to PayPal or other personal accounts. Purchase travel through Globe Trotting with peace
                        of mind - your money and your dream trip are protected and secure.</p>
                </div>

                <!-- Payment Security -->
                <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-blue-800 mb-2">Secure Payment Processing</h4>
                    <p class="text-blue-700 mb-2">Your payments always go directly to the travel supplier (hotel,
                        cruise line, airline, etc.) or Globe Trotting.</p>
                    <a href="tel=+44 1375 481962" class="text-blue-700"><strong>If you are asked for cash or personal payments, call +44 1375 481962</strong></a>
                </div>

                <!-- ATOL Section -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">ATOL 12022 – Air Travel Organisers Licence</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <p>All the flight-inclusive holidays on this website are financially protected by the ATOL
                            scheme. When you pay you will be supplied with an <strong>ATOL Certificate</strong>.</p>
                        <p>Please ask for it and check to ensure that everything you booked (flights, hotels and other
                            services) is listed on it. If you do receive an ATOL Certificate but all the parts of your
                            trip are not listed on it, those parts will not be ATOL protected.</p>
                        <p>Some of the flights on this website are also financially protected by the ATOL scheme, but
                            ATOL protection does not apply to all flights. This website will provide you with
                            information on the protection that applies in the case of each flight before you make your
                            booking.</p>
                        <p><strong>If you do not receive an ATOL Certificate then the booking will not be ATOL
                                protected.</strong></p>
                        <div class="bg-gray-50 p-3 rounded-lg mt-3">
                            <p class="text-sm">For further information about ATOL, contact the ATOL Protection at: <a
                                    href="https://www.caa.co.uk/atol-protection/"
                                    target="_blank" class="text-blue-600 hover:underline">https://www.caa.co.uk/atol-protection/</a></p>
                        </div>
                    </div>
                </div>

                <!-- ABTA Membership -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">ABTA Membership</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <p>Globe Trotting.uk is a Member of ABTA. ABTA and ABTA Members help holidaymakers to get the
                            most from their travel and assist them when things do not go according to plan.</p>
                        <p>We are obliged to maintain a high standard of service to you by ABTA's Code of Conduct.</p>
                        <div class="bg-gray-50 p-3 rounded-lg mt-3">
                            <p class="text-sm mb-2">For further information about ABTA, the Code of Conduct and the
                                arbitration scheme available to you if you have a complaint, contact:</p>
                            <div class="text-sm">
                                <p><strong>ABTA</strong></p>
                                <p>30 Park Street, London SE1 9EQ</p>
                                <p>Tel: 020 3117 0500</p>
                                <p><a href="https://abta.com" target="_blank"
                                        class="text-blue-600 hover:underline">www.abta.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Travel Advice -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-10 h-10 bg-yellow-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Travel and Destination Advice</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <p>For the latest travel advice from the Foreign, Commonwealth and Development Office including
                            security and local laws, plus passport and visa information:</p>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-sm"><a href="https://www.gov.uk/foreign-travel-advice" target="_blank"
                                    class="text-blue-600 hover:underline">UK Government Travel Advice</a></p>
                        </div>
                    </div>
                </div>

                <!-- Complaint Resolution -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Complaint &amp; Dispute Resolution</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                            <p class="font-semibold text-yellow-800">Important:</p>
                            <p class="text-yellow-700">If you have a problem whilst on holiday, this must be reported
                                to the relevant principal/supplier or their local supplier or agent immediately.</p>
                        </div>
                        <p>If you fail to follow this procedure there will be less opportunity to investigate and
                            rectify your complaint. The amount of compensation you may be entitled to may be reduced or
                            you may not receive any at all depending upon the circumstances.</p>
                        <p>If you wish to complain when you return home, write to the principal/supplier. You will see
                            the name and address plus contact details in any confirmation documents we send you.</p>
                        <p>We will of course assist you with this if you wish - please contact your Globe Trotting agent
                            and copy Customer Services at <a href="mailto:support@globetrotting.co.uk"
                                class="text-blue-600 hover:underline">support@globetrotting.co.uk</a></p>
                        <p>If the matter cannot be resolved and it involves us or another ABTA Member, you have the
                            option to use ABTA's alternative dispute resolution (ADR) scheme, approved by the Chartered Trading Standards Institute. <a
                                href="https://www.abta.com" target="_blank"
                                class="text-blue-600 hover:underline">Learn more at www.abta.com</a></p>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gray-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Additional Information</h3>
                    </div>
                    <div class="space-y-3 text-gray-700">
                        <div>
                            <h4 class="font-semibold mb-2">Links to Other Websites</h4>
                            <p class="text-sm">On this site you will find links to other third party websites. These
                                are for your convenience only and Globe Trotting.uk is not responsible for the content
                                of the third party site.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Data Protection &amp; Privacy</h4>
                            <p class="text-sm">Please see our Privacy Policy for information about what data we collect
                                and how personal information will be used, who it will be passed to, etc. You have the
                                right to see the personal data we hold about you, and to request modification or
                                deletion.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Cookies</h4>
                            <p class="text-sm">This site uses cookies as explained in our Privacy Policy. If you use
                                this site without adjusting your cookies settings, you agree to our use of cookies.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                <button onclick="closeProtectionModal()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function closeProtectionModal() {
    document.getElementById('protectionModal').classList.add('hidden');
    document.getElementById('protectionModal').classList.remove('flex');
}

function openProtectionModal() {
    document.getElementById('protectionModal').classList.remove('hidden');
    document.getElementById('protectionModal').classList.add('flex');
}
</script>