<!-- Scroll to Top Widget -->
<div id="scrollToTop" class="fixed bottom-6 right-6 z-50 opacity-0 invisible transition-all duration-300 transform translate-y-4 group">
  <!-- Main Button -->
  <button 
    onclick="scrollToTop()"
    class="relative bg-gradient-to-br from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 group-hover:-translate-y-1"
    aria-label="Scroll to top"
  >
    <!-- Wave Effect Background -->
    <div class="absolute inset-0 bg-blue-400 rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300 animate-ping"></div>
    
    <!-- Arrow Icon -->
    <svg class="w-6 h-6 relative z-10 transform group-hover:-translate-y-0.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
    
    <!-- Ripple Effect -->
    <div class="absolute inset-0 rounded-full bg-white opacity-0 group-active:opacity-30 transition-opacity duration-150"></div>
  </button>
  
  <!-- Progress Ring (Optional) -->
  <svg class="absolute inset-0 w-full h-full -rotate-90 pointer-events-none" viewBox="0 0 100 100">
    <circle 
      cx="50" 
      cy="50" 
      r="45" 
      fill="none" 
      stroke="rgba(59, 130, 246, 0.2)" 
      stroke-width="2"
    />
    <circle 
      id="progressRing"
      cx="50" 
      cy="50" 
      r="45" 
      fill="none" 
      stroke="rgba(59, 130, 246, 0.8)" 
      stroke-width="2"
      stroke-dasharray="282.743"
      stroke-dashoffset="282.743"
      stroke-linecap="round"
      class="transition-all duration-150 ease-out"
    />
  </svg>
  
  <!-- Tooltip -->
  <div class="absolute bottom-full right-0 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
    <div class="bg-gray-900 text-white text-sm px-3 py-2 rounded-lg whitespace-nowrap">
      Back to top
      <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
    </div>
  </div>
</div>

<script>
// Scroll to Top Functionality
(function() {
  const scrollToTopBtn = document.getElementById('scrollToTop');
  const progressRing = document.getElementById('progressRing');
  const circumference = 2 * Math.PI * 45; // 2πr where r=45
  
  // Set initial progress ring
  progressRing.style.strokeDasharray = circumference;
  progressRing.style.strokeDashoffset = circumference;
  
  // Show/hide button based on scroll position
  function toggleScrollButton() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrollPercent = scrollTop / docHeight;
    
    if (scrollTop > 300) {
      scrollToTopBtn.classList.remove('opacity-0', 'invisible', 'translate-y-4');
      scrollToTopBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
    } else {
      scrollToTopBtn.classList.add('opacity-0', 'invisible', 'translate-y-4');
      scrollToTopBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
    }
    
    // Update progress ring
    const offset = circumference - (scrollPercent * circumference);
    progressRing.style.strokeDashoffset = offset;
  }
  
  // Smooth scroll to top function
  window.scrollToTop = function() {
    const scrollStep = -window.scrollY / (500 / 15); // 500ms duration
    const scrollInterval = setInterval(function() {
      if (window.scrollY !== 0) {
        window.scrollBy(0, scrollStep);
      } else {
        clearInterval(scrollInterval);
      }
    }, 15);
  };
  
  // Alternative smooth scroll (modern browsers)
  window.scrollToTopSmooth = function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  };
  
  // Event listeners
  window.addEventListener('scroll', toggleScrollButton);
  window.addEventListener('resize', toggleScrollButton);
  
  // Initial check
  toggleScrollButton();
})();
</script>

<style>
/* Additional animations for enhanced experience */
@keyframes wave-pulse {
  0%, 100% { 
    transform: scale(1);
    opacity: 0.8;
  }
  50% { 
    transform: scale(1.05);
    opacity: 0.6;
  }
}

#scrollToTop:hover .animate-ping {
  animation: wave-pulse 1.5s ease-in-out infinite;
}

/* Smooth entrance animation */
@keyframes slideInUp {
  from {
    opacity: 0;
    transform: translateY(30px) scale(0.8);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

#scrollToTop.visible {
  animation: slideInUp 0.3s ease-out;
}
</style>