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
                        <h2 class="text-2xl font-bold text-gray-900">CONSUMER PROTECTION</h2>
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
                <!-- ATOL Section -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">ATOL – Air Travel Organisers Licence</h3>
                    </div>
                    <div class="text-gray-700 leading-relaxed">
                        <p class="mb-3">Many of the flights and flight-inclusive holidays on this website are financially protected by the ATOL financial protection scheme through our supplier partners (travel brands).</p>
                        
                        <p class="mb-3">But ATOL protection does not apply to all holiday and travel services listed on this website. Please ask your agent to confirm what protection may apply to your booking.</p>
                        
                        <p class="mb-3">If you do not receive an ATOL Certificate then the booking will not be ATOL protected.</p>
                        
                        <p>Please see our booking condition information or for more about financial protection and the ATOL certificate go to <a href="https://www.atol.org.uk/ATOLCertificate" target="_blank" class="text-blue-600 hover:underline font-medium">www.atol.org.uk/ATOLCertificate</a></p>
                    </div>
                </div>

                <!-- ABTA Section -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">ABTA – The Travel Association</h3>
                    </div>
                    <div class="text-gray-700 leading-relaxed">
                        <p class="mb-3"><strong>Book with Confidence.</strong> We are a member of ABTA which means you have the benefit of ABTA's assistance and Code of Conduct.</p>
                        
                        <p class="mb-3">All the package holidays we sell are covered by a scheme protecting your money if the supplier fails. Other services such as hotels or flights on their own may not be protected and you should ask us what protection is available.</p>
                        
                        <p>Find out more at <a href="http://abta.com/go-travel/before-you-travel/travel-tips/financial-protection-3" target="_blank" class="text-blue-600 hover:underline font-medium">abta.com/go-travel/before-you-travel/travel-tips/financial-protection-3</a></p>
                    </div>
                </div>

                <!-- Travel Advice -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-yellow-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Travel and Destination Advice</h3>
                    </div>
                    <div class="text-gray-700 leading-relaxed">
                        <p>For the latest travel advice from the Foreign, Commonwealth and Development Office including security and local laws, plus passport and visa information, click here:</p>
                        <p class="mt-2"><a href="https://www.gov.uk/foreign-travel-advice" target="_blank" class="text-blue-600 hover:underline font-medium">www.gov.uk/foreign-travel-advice</a></p>
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
                        <h3 class="text-xl font-bold text-gray-900">Complaint Dispute Resolution</h3>
                    </div>
                    <div class="text-gray-700 leading-relaxed space-y-3">
                        <p>Because the contract(s) for your travel arrangements is between you and the principal(s) or supplier(s), any queries or concerns relating to the travel arrangements should be addressed to them.</p>
                        
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                            <p class="font-semibold text-yellow-800 mb-2">Important:</p>
                            <p class="text-yellow-700">If you have a problem whilst on holiday, this must be reported to the principal/supplier or their local supplier or agent immediately.</p>
                        </div>
                        
                        <p>If you fail to follow this procedure there will be less opportunity to investigate and rectify your complaint. The amount of compensation you may be entitled to may be reduced or you may not receive any at all depending upon the circumstances.</p>
                        
                        <p>If you wish to complain when you return home, write to the principal/supplier. You will see the name and address plus contact details in any confirmation documents we send you.</p>
                        
                        <p>We will of course assist you with this if you wish – please contact your GlobeTrottingTravelUK agent and copy Customer Services at <a href="mailto:support@globetrottingtraveluk.com/" class="text-blue-600 hover:underline font-medium">support@globetrottingtraveluk.com</a></p>
                        
                        <p>If the matter cannot be resolved and it involves us or another ABTA Member then you have the option to use ABTA's ADR scheme, approved by the Chartered Trading Standards Institute, see <a href="https://abta.com" target="_blank" class="text-blue-600 hover:underline font-medium">abta.com</a></p>
                        
                        <p>You can also access the European Commission Online Dispute (ODR) Resolution platform at <a href="http://ec.europa.eu/consumers/odr" target="_blank" class="text-blue-600 hover:underline font-medium">ec.europa.eu/consumers/odr</a>. This ODR platform is a means of notifying us of your complaint; it will not determine how your complaint should be resolved.</p>
                    </div>
                </div>

                <!-- ABTA Membership Details -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">ABTA Membership</h3>
                    </div>
                    <div class="text-gray-700 leading-relaxed space-y-3">
                        <p>Find out more HERE: <a href="http://abta.com/find-a-member" target="_blank" class="text-blue-600 hover:underline font-medium">abta.com/find-a-member</a></p>
                        
                        <p>GlobeTrottingTravelUK is a Member of ABTA. ABTA and ABTA Members help holidaymakers to get the most from their travel and assist them when things do not go according to plan.</p>
                        
                        <p>We are obliged to maintain a high standard of service to you by ABTA's Code of Conduct.</p>
                        
                        <div class="bg-gray-50 p-4 rounded-lg mt-3">
                            <p class="mb-3">For further information about ABTA, the Code of Conduct and the arbitration scheme available to you if you have a complaint, contact:</p>
                            <div class="space-y-1">
                                <p><strong>ABTA</strong></p>
                                <p>30 Park Street</p>
                                <p>London SE1 9EQ</p>
                                <p>Tel: 020 3117 0500</p>
                                <p><a href="https://www.abta.com" target="_blank" class="text-blue-600 hover:underline font-medium">www.abta.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Links to Other Websites -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gray-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Links to Other Websites</h3>
                    </div>
                    <div class="text-gray-700 leading-relaxed">
                        <p>On this site you will find links to other third party websites. These are for your convenience only and GlobeTrottingTravelUK is not responsible for the content of the third party site.</p>
                    </div>
                </div>

                <!-- Data Protection & Privacy -->
                <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-600 text-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Data Protection, Cookie & Privacy Policy</h3>
                    </div>
                    <div class="text-gray-700 leading-relaxed space-y-3">
                        <p>Please see link to our <a href="#" class="text-blue-600 hover:underline font-medium">Privacy Policy</a> stating what data we collect and what the personal information will be used for, who it will be passed to, etc.</p>
                        
                        <p>You have the right to see the personal data we hold about you, and to request modification or deletion.</p>
                        
                        <p>This site uses cookies, as explained in our <a href="{{route('privacy.policy')}}" class="text-blue-600 hover:underline font-medium">Privacy Policy</a>. If you use this site without adjusting your cookies settings, you agree to our use of cookies.</p>
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