<section id="book-now-section" class="relative min-h-screen py-20 px-4 sm:px-8 lg:px-24 overflow-hidden bg-gradient-to-br from-sky-50 via-blue-50 to-indigo-50">
  <!-- Enhanced Background Elements -->
  <div class="absolute inset-0 pointer-events-none">
    <div class="floating-element absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-sky-200 to-blue-300 rounded-full opacity-30 blur-xl"></div>
    <div class="floating-element absolute top-40 right-20 w-24 h-24 bg-gradient-to-br from-blue-200 to-indigo-300 rounded-full opacity-25 blur-lg"></div>
    <div class="floating-element absolute bottom-40 left-20 w-40 h-40 bg-gradient-to-br from-sky-100 to-blue-200 rounded-full opacity-20 blur-2xl"></div>
    <div class="floating-element absolute bottom-20 right-40 w-20 h-20 bg-gradient-to-br from-blue-300 to-sky-400 rounded-full opacity-35 blur-lg"></div>
    <div class="floating-element absolute top-60 left-1/2 w-28 h-28 bg-gradient-to-br from-sky-200 to-blue-300 rounded-full opacity-25 blur-xl"></div>
    <div class="floating-element absolute top-32 right-60 w-16 h-16 bg-gradient-to-br from-blue-200 to-indigo-300 rounded-full opacity-40 blur-lg"></div>
    <div class="floating-element absolute bottom-60 left-40 w-36 h-36 bg-gradient-to-br from-sky-100 to-blue-200 rounded-full opacity-15 blur-2xl"></div>
  </div>

  <!-- Interactive Particles -->
  <div id="particles" class="absolute inset-0 pointer-events-none"></div>

  <div class="max-w-8xl mx-auto relative z-10">
    <!-- Title with enhanced styling -->
    <div class="text-center mb-16">
      <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 bg-gradient-to-r from-sky-600 via-blue-600 to-indigo-600 bg-clip-text text-transparent">
        Book Your Dream Trip
      </h2>
      <p class="text-gray-600 text-lg sm:text-xl max-w-2xl mx-auto leading-relaxed">
        Discover amazing destinations with our all-in-one travel platform. 
        <span class="text-sky-600 font-semibold">Flights, cars, stays & experiences</span> 
        – everything you need in one place.
      </p>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
      
      <!-- Booking Form Side -->
      <div class="order-2 lg:order-1">
        <!-- Enhanced Mobile Scrollable Tabs with clear scroll indicators -->
        <div class="mb-8 relative">
          <!-- Scroll indicator shadows -->
          <div class="absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-sky-50 via-sky-50 to-transparent z-10 pointer-events-none scroll-shadow-left opacity-0"></div>
          <div class="absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-sky-50 via-sky-50 to-transparent z-10 pointer-events-none scroll-shadow-right"></div>
          
          <div class="tab-container overflow-x-auto pb-4">
            <div class="flex space-x-3 min-w-max justify-center lg:justify-center">
              <button onclick="showForm('car')" id="tab-car" class="tab-btn group relative px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105 whitespace-nowrap shadow-lg">
                <span class="relative z-10 flex items-center space-x-3">
                  <span class="text-2xl group-hover:animate-bounce transition-transform">🚗</span>
                  <span class="font-semibold text-base">Car Rentals</span>
                </span>
              </button>
              <button onclick="showForm('flight')" id="tab-flight" class="tab-btn group relative px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105 whitespace-nowrap shadow-lg">
                <span class="relative z-10 flex items-center space-x-3">
                  <span class="text-2xl group-hover:animate-bounce transition-transform">✈️</span>
                  <span class="font-semibold text-base">Flights</span>
                </span>
              </button>
              <button onclick="showForm('stay')" id="tab-stay" class="tab-btn group relative px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105 whitespace-nowrap shadow-lg">
                <span class="relative z-10 flex items-center space-x-3">
                  <span class="text-2xl group-hover:animate-bounce transition-transform">🏨</span>
                  <span class="font-semibold text-base">Hotels</span>
                </span>
              </button>
              <button onclick="showForm('activity')" id="tab-activity" class="tab-btn group relative px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105 whitespace-nowrap shadow-lg">
                <span class="relative z-10 flex items-center space-x-3">
                  <span class="text-2xl group-hover:animate-bounce transition-transform">🎟️</span>
                  <span class="font-semibold text-base">Activities</span>
                </span>
              </button>
            </div>
          </div>
        </div>

        <!-- Enhanced Forms Container -->
        <div class="form-container bg-white/95 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-sky-100 relative overflow-hidden">
          <!-- Glassmorphism background effect -->
          <div class="absolute inset-0 bg-gradient-to-br from-sky-50/50 to-blue-50/50 backdrop-blur-sm"></div>
          
          <!-- Car Form -->
          <div id="form-car" class="tab-form relative z-10">
            <div class="flex items-center mb-8">
              <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl flex items-center justify-center mr-5 shadow-lg">
                <span class="text-white text-2xl">🚗</span>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Car Rentals</h3>
                <p class="text-gray-600">Select pick-up and drop-off locations and times for your rental.</p>
              </div>
            </div>
            
            <div class="flex space-x-8 mb-8">
              <label class="inline-flex items-center cursor-pointer group">
                <input type="radio" name="locationType" class="form-radio text-sky-500 scale-125 focus:ring-sky-500" checked />
                <span class="ml-3 text-gray-700 group-hover:text-sky-600 transition-colors font-medium">Airport Location</span>
              </label>
              <label class="inline-flex items-center cursor-pointer group">
                <input type="radio" name="locationType" class="form-radio text-sky-500 scale-125 focus:ring-sky-500" />
                <span class="ml-3 text-gray-700 group-hover:text-sky-600 transition-colors font-medium">City Location</span>
              </label>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="input-group">
                <input type="text" placeholder="Pick-Up Location" class="interactive-input" />
                <span class="input-icon">📍</span>
              </div>
              <div class="input-group">
                <input type="text" placeholder="Drop-Off Location" class="interactive-input" />
                <span class="input-icon">📍</span>
              </div>
              <div class="input-group">
                <input type="date" class="interactive-input" />
                <span class="input-icon">📅</span>
              </div>
              <div class="input-group">
                <select class="interactive-input">
                  <option>Noon</option><option>Morning</option><option>Evening</option>
                </select>
                <span class="input-icon">🕓</span>
              </div>
              <div class="input-group">
                <input type="date" class="interactive-input" />
                <span class="input-icon">📅</span>
              </div>
              <div class="input-group">
                <select class="interactive-input">
                  <option>Noon</option><option>Morning</option><option>Evening</option>
                </select>
                <span class="input-icon">🕓</span>
              </div>
              <div class="input-group md:col-span-2">
                <input type="number" placeholder="Driver's Age" class="interactive-input" />
                <span class="input-icon">👤</span>
              </div>
            </div>
          </div>

          <!-- Flight Form -->
          <div id="form-flight" class="tab-form relative z-10 hidden">
            <div class="flex items-center mb-8">
              <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl flex items-center justify-center mr-5 shadow-lg">
                <span class="text-white text-2xl">✈️</span>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Flight Booking</h3>
                <p class="text-gray-600">Plan your roundtrip flights with passenger information.</p>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="input-group">
                <input class="interactive-input" type="text" placeholder="Departure Airport" />
                <span class="input-icon">✈️</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="date" />
                <span class="input-icon">📅</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="text" placeholder="Arrival Airport" />
                <span class="input-icon">🛬</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="date" />
                <span class="input-icon">📅</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Adults" />
                <span class="input-icon">👥</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Seniors (65+)" />
                <span class="input-icon">👴</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Children (under 12)" />
                <span class="input-icon">👧</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Infants (under 2)" />
                <span class="input-icon">👶</span>
              </div>
              <div class="input-group md:col-span-2">
                <select class="interactive-input">
                  <option>Cabin Class</option>
                  <option>Economy</option>
                  <option>Premium Economy</option>
                  <option>Business</option>
                  <option>First</option>
                </select>
                <span class="input-icon">🛋️</span>
              </div>
            </div>
          </div>

          <!-- Stay Form -->
          <div id="form-stay" class="tab-form relative z-10 hidden">
            <div class="flex items-center mb-8">
              <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl flex items-center justify-center mr-5 shadow-lg">
                <span class="text-white text-2xl">🏨</span>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Hotel Booking</h3>
                <p class="text-gray-600">Find perfect accommodations for your stay.</p>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="input-group md:col-span-2">
                <input class="interactive-input" type="text" placeholder="Location (City, Airport, Landmark)" />
                <span class="input-icon">🗺️</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="date" />
                <span class="input-icon">📅</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="date" />
                <span class="input-icon">📅</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Rooms" />
                <span class="input-icon">🛏️</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Radius (km)" />
                <span class="input-icon">📏</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Adults" />
                <span class="input-icon">👥</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="number" placeholder="Children" />
                <span class="input-icon">👶</span>
              </div>
            </div>
          </div>

          <!-- Activity Form -->
          <div id="form-activity" class="tab-form relative z-10 hidden">
            <div class="flex items-center mb-8">
              <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl flex items-center justify-center mr-5 shadow-lg">
                <span class="text-white text-2xl">🎟️</span>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Activities & Tours</h3>
                <p class="text-gray-600">Discover and book amazing local experiences.</p>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="input-group md:col-span-2">
                <input class="interactive-input" type="text" placeholder="Location (City, Airport, Landmark)" />
                <span class="input-icon">🗺️</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="date" placeholder="Activity Start" />
                <span class="input-icon">📅</span>
              </div>
              <div class="input-group">
                <input class="interactive-input" type="date" placeholder="Activity End" />
                <span class="input-icon">📅</span>
              </div>
            </div>
          </div>

          <!-- Enhanced Submit Button -->
          <div class="pt-8">
            <button id="searchBtn" class="search-button relative w-full bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white px-10 py-5 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-2xl overflow-hidden group">
              <span class="relative z-10 flex items-center justify-center space-x-3">
                <span class="text-lg">SEARCH & BOOK NOW</span>
                <span class="text-xl group-hover:animate-pulse transition-transform group-hover:scale-110">🚀</span>
              </span>
              <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </button>
          </div>
        </div>
      </div>

      <!-- Enhanced Animated Guide Side -->
      <div class="order-1 lg:order-2">
        <div class="sticky top-8">
          <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-10 border border-sky-100">
            <h3 class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-blue-600 bg-clip-text text-transparent mb-8 text-center">
              How It Works
            </h3>
            
            <div class="space-y-8">
              <div class="guide-step flex items-start space-x-5 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="step-number bg-gradient-to-br from-sky-500 to-blue-600 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-lg shadow-lg">1</div>
                <div>
                  <h4 class="font-bold text-gray-800 mb-3 text-lg">Choose Your Service</h4>
                  <p class="text-gray-600">Select from cars, flights, stays, or activities using our intuitive tabs.</p>
                </div>
              </div>
              
              <div class="guide-step flex items-start space-x-5 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="step-number bg-gradient-to-br from-sky-500 to-blue-600 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-lg shadow-lg">2</div>
                <div>
                  <h4 class="font-bold text-gray-800 mb-3 text-lg">Fill in Details</h4>
                  <p class="text-gray-600">Enter your travel preferences, dates, and passenger information.</p>
                </div>
              </div>
              
              <div class="guide-step flex items-start space-x-5 opacity-0 animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="step-number bg-gradient-to-br from-sky-500 to-blue-600 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-lg shadow-lg">3</div>
                <div>
                  <h4 class="font-bold text-gray-800 mb-3 text-lg">Search & Compare</h4>
                  <p class="text-gray-600">We'll find the best options and prices across multiple providers.</p>
                </div>
              </div>
              
              <div class="guide-step flex items-start space-x-5 opacity-0 animate-fade-in-up" style="animation-delay: 0.8s;">
                <div class="step-number bg-gradient-to-br from-sky-500 to-blue-600 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-lg shadow-lg">4</div>
                <div>
                  <h4 class="font-bold text-gray-800 mb-3 text-lg">Book & Enjoy</h4>
                  <p class="text-gray-600">Secure your booking and get ready for your amazing adventure!</p>
                </div>
              </div>
            </div>

            <!-- Enhanced Animated Travel Icons -->
            <div class="mt-10 flex justify-center space-x-6">
              <div class="travel-icon text-4xl animate-bounce" style="animation-delay: 1s;">🗺️</div>
              <div class="travel-icon text-4xl animate-bounce" style="animation-delay: 1.2s;">🎒</div>
              <div class="travel-icon text-4xl animate-bounce" style="animation-delay: 1.4s;">📸</div>
              <div class="travel-icon text-4xl animate-bounce" style="animation-delay: 1.6s;">🌟</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    * {
      font-family: 'Inter', sans-serif;
    }

    /* Enhanced floating animations */
    .floating-element {
      animation: float 12s ease-in-out infinite;
    }

    .floating-element:nth-child(2n) {
      animation-delay: -6s;
    }

    .floating-element:nth-child(3n) {
      animation-delay: -3s;
    }

    .floating-element:nth-child(4n) {
      animation-delay: -9s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
      25% { transform: translateY(-20px) rotate(90deg) scale(1.05); }
      50% { transform: translateY(-40px) rotate(180deg) scale(1.1); }
      75% { transform: translateY(-20px) rotate(270deg) scale(1.05); }
    }

    .animate-fade-in-up {
      animation: fadeInUp 0.8s ease-out forwards;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Enhanced tab container with scroll indicators */
    .tab-container {
      position: relative;
    }

    .tab-container::-webkit-scrollbar {
      height: 6px;
    }

    .tab-container::-webkit-scrollbar-track {
      background: rgba(14, 165, 233, 0.1);
      border-radius: 3px;
    }

    .tab-container::-webkit-scrollbar-thumb {
      background: linear-gradient(to right, #0ea5e9, #3b82f6);
      border-radius: 3px;
    }

    .tab-container::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(to right, #0284c7, #2563eb);
    }

    /* Show scroll shadows when needed */
    .tab-container:not(:hover) + .scroll-shadow-right {
      opacity: 0.8;
      animation: pulse-shadow 2s ease-in-out infinite;
    }

    @keyframes pulse-shadow {
      0%, 100% { opacity: 0.8; }
      50% { opacity: 0.4; }
    }

    /* Enhanced input styling */
    .input-group {
      position: relative;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input-group:hover {
      transform: translateY(-3px);
    }

    .interactive-input {
      width: 100%;
      padding: 18px 18px 18px 52px;
      background: rgba(255, 255, 255, 0.95);
      border: 2px solid #e0f2fe;
      border-radius: 16px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 16px;
      color: #1f2937;
      backdrop-filter: blur(10px);
    }

    .interactive-input:focus {
      outline: none;
      border-color: #0ea5e9;
      background: rgba(255, 255, 255, 1);
      box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1), 0 10px 25px rgba(14, 165, 233, 0.15);
      transform: translateY(-2px);
    }

    .interactive-input::placeholder {
      color: #9ca3af;
      font-weight: 500;
    }

    .input-icon {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
      pointer-events: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input-group:hover .input-icon {
      transform: translateY(-50%) scale(1.15);
    }

    .input-group:focus-within .input-icon {
      transform: translateY(-50%) scale(1.2);
    }

    /* Enhanced tab button styling */
    .tab-btn {
      border: 2px solid #e0f2fe;
      color: #374151;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(15px);
      position: relative;
      overflow: hidden;
    }

    .tab-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s;
    }

    .tab-btn:hover::before {
      left: 100%;
    }

    .tab-btn.active {
      background: linear-gradient(135deg, #0ea5e9, #3b82f6);
      color: white;
      border-color: #0ea5e9;
      box-shadow: 0 8px 32px rgba(14, 165, 233, 0.3);
    }

    .tab-btn.active::before {
      display: none;
    }

    /* Enhanced form transitions */
    .tab-form {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      display: none;
    }

    .tab-form.active {
      opacity: 1;
      transform: translateY(0);
      display: block;
    }

    /* Enhanced search button */
    .search-button {
      position: relative;
      overflow: hidden;
    }

    .search-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.6s;
    }

    .search-button:hover::before {
      left: 100%;
    }

    .search-button:hover {
      box-shadow: 0 15px 40px rgba(14, 165, 233, 0.4);
    }

    /* Enhanced particles */
    .particle {
      position: absolute;
      width: 4px;
      height: 4px;
      background: linear-gradient(45deg, #0ea5e9, #3b82f6);
      border-radius: 50%;
      pointer-events: none;
      opacity: 0.6;
      box-shadow: 0 0 10px rgba(14, 165, 233, 0.5);
    }

    @keyframes particle-float {
      0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
      10% { opacity: 0.6; }
      90% { opacity: 0.6; }
      100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }

    .travel-icon {
      animation-duration: 2s;
      animation-iteration-count: infinite;
      filter: drop-shadow(0 4px 8px rgba(14, 165, 233, 0.3));
    }

    .step-number {
      flex-shrink: 0;
    }

    /* Mobile responsive enhancements */
    @media (max-width: 768px) {
      .tab-container {
        padding-left: 1rem;
        padding-right: 1rem;
      }
      
      .scroll-shadow-right {
        opacity: 1 !important;
        animation: pulse-shadow 2s ease-in-out infinite;
      }
    }
  </style>

  <script>
    function showForm(type) {
      const tabs = ['car', 'flight', 'stay', 'activity'];
      tabs.forEach(tab => {
        const form = document.getElementById(`form-${tab}`);
        const tabBtn = document.getElementById(`tab-${tab}`);
        
        form.classList.remove('active');
        tabBtn.classList.remove('active');
        
        // Enhanced bounce animation
        const icon = tabBtn.querySelector('span:first-child');
        if (tab === type) {
          icon.classList.add('animate-bounce');
          setTimeout(() => icon.classList.remove('animate-bounce'), 1500);
        }
      });
      
      // Add slight delay for smoother transition
      setTimeout(() => {
        document.getElementById(`form-${type}`).classList.add('active');
        document.getElementById(`tab-${type}`).classList.add('active');
      }, 100);
    }

    // Initialize with car form
    showForm('car');

    // Enhanced particle creation
    function createParticle() {
      const particle = document.createElement('div');
      particle.className = 'particle';
      particle.style.left = Math.random() * 100 + '%';
      particle.style.animation = `particle-float ${Math.random() * 6 + 8}s linear infinite`;
      particle.style.animationDelay = Math.random() * 2 + 's';
      document.getElementById('particles').appendChild(particle);
      
      setTimeout(() => {
        particle.remove();
      }, 16000);
    }

    // Create particles more frequently
    setInterval(createParticle, 2000);

    // Enhanced search button animation
    document.getElementById('searchBtn').addEventListener('click', function() {
      this.style.transform = 'scale(0.95)';
      this.style.boxShadow = '0 5px 20px rgba(14, 165, 233, 0.3)';
      
      setTimeout(() => {
        this.style.transform = 'scale(1.05)';
        this.style.boxShadow = '0 20px 50px rgba(14, 165, 233, 0.5)';
        
        setTimeout(() => {
          this.style.transform = 'scale(1)';
          this.style.boxShadow = '0 15px 40px rgba(14, 165, 233, 0.4)';
        }, 150);
      }, 100);
    });

    // Enhanced input focus animations
    document.querySelectorAll('.interactive-input').forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateY(-5px)';
        this.parentElement.style.filter = 'drop-shadow(0 10px 20px rgba(14, 165, 233, 0.1))';
      });
      
      input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateY(0)';
        this.parentElement.style.filter = 'none';
      });
    });

    // Enhanced parallax effect
    document.addEventListener('mousemove', function(e) {
      const mouseX = e.clientX / window.innerWidth;
      const mouseY = e.clientY / window.innerHeight;
      
      document.querySelectorAll('.floating-element').forEach((element, index) => {
        const speed = (index + 1) * 0.5;
        const x = (mouseX - 0.5) * speed * 40;
        const y = (mouseY - 0.5) * speed * 40;
        element.style.transform = `translate(${x}px, ${y}px)`;
      });
    });

    // Handle tab container scroll shadows
    function handleScrollShadows() {
      const container = document.querySelector('.tab-container');
      const leftShadow = document.querySelector('.scroll-shadow-left');
      const rightShadow = document.querySelector('.scroll-shadow-right');
      
      if (container && leftShadow && rightShadow) {
        container.addEventListener('scroll', function() {
          const scrollLeft = this.scrollLeft;
          const scrollWidth = this.scrollWidth;
          const clientWidth = this.clientWidth;
          
          // Show left shadow if scrolled right
          if (scrollLeft > 10) {
            leftShadow.style.opacity = '1';
          } else {
            leftShadow.style.opacity = '0';
          }
          
          // Show right shadow if not scrolled to end
          if (scrollLeft < scrollWidth - clientWidth - 10) {
            rightShadow.style.opacity = '1';
          } else {
            rightShadow.style.opacity = '0';
          }
        });
        
        // Initial check
        const scrollWidth = container.scrollWidth;
        const clientWidth = container.clientWidth;
        if (scrollWidth > clientWidth) {
          rightShadow.style.opacity = '1';
        }
      }
    }

    // Initialize scroll shadows
    document.addEventListener('DOMContentLoaded', handleScrollShadows);

    // Add ripple effect to buttons
    document.querySelectorAll('.tab-btn, .search-button').forEach(button => {
      button.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple');
        
        this.appendChild(ripple);
        
        setTimeout(() => {
          ripple.remove();
        }, 600);
      });
    });

    // Add floating animation to form container
    setInterval(() => {
      const formContainer = document.querySelector('.form-container');
      if (formContainer) {
        formContainer.style.transform = 'translateY(-2px)';
        setTimeout(() => {
          formContainer.style.transform = 'translateY(0)';
        }, 2000);
      }
    }, 8000);
  </script>

  <style>
    /* Ripple effect */
    .ripple {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.4);
      transform: scale(0);
      animation: ripple-animation 0.6s linear;
      pointer-events: none;
    }

    @keyframes ripple-animation {
      to {
        transform: scale(4);
        opacity: 0;
      }
    }

    /* Enhanced responsive design */
    @media (max-width: 640px) {
      .floating-element {
        opacity: 0.15 !important;
      }
      
      .tab-btn {
        padding: 12px 20px !important;
      }
      
      .tab-btn span {
        font-size: 14px !important;
      }
      
      .interactive-input {
        padding: 16px 16px 16px 48px !important;
        font-size: 15px !important;
      }
    }
  </style>
</section>
