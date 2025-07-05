@php
    // Static travel tips data
    $posts = [
        [
            'title' => 'Top 10 Hidden Gems in Southeast Asia',
            'description' => 'Discover breathtaking destinations off the beaten path that will leave you speechless. From secret beaches to ancient temples, explore the undiscovered beauty of Southeast Asia.',
            'thumbnail' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop',
            'link' => '#',
            'author' => 'Sarah Johnson',
            'pubDate' => '2024-06-15 10:30:00'
        ],
        [
            'title' => 'Budget Travel Guide: Europe in 30 Days',
            'description' => 'Learn how to explore 15 European countries without breaking the bank. Complete with accommodation tips, transportation hacks, and must-see attractions.',
            'thumbnail' => 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=300&fit=crop',
            'link' => '#',
            'author' => 'Mike Chen',
            'pubDate' => '2024-06-12 14:15:00'
        ],
        [
            'title' => 'Solo Female Travel Safety Tips',
            'description' => 'Essential safety advice for women traveling alone. From choosing accommodations to staying connected, everything you need to know for a safe adventure.',
            'thumbnail' => 'https://images.unsplash.com/photo-1544717297-fa95b6ee9643?w=400&h=300&fit=crop',
            'link' => '#',
            'author' => 'Emma Rodriguez',
            'pubDate' => '2024-06-10 09:45:00'
        ],
        [
            'title' => 'Digital Nomad Destinations 2024',
            'description' => 'The best cities for remote workers with reliable internet, affordable living costs, and vibrant communities. Start your nomadic journey today.',
            'thumbnail' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=400&h=300&fit=crop',
            'link' => '#',
            'author' => 'Alex Thompson',
            'pubDate' => '2024-06-08 16:20:00'
        ],
        [
            'title' => 'Sustainable Travel: Leave No Trace',
            'description' => 'How to minimize your environmental impact while exploring the world. Tips for eco-friendly accommodations, transportation, and activities.',
            'thumbnail' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=300&fit=crop',
            'link' => '#',
            'author' => 'Green Traveler',
            'pubDate' => '2024-06-05 11:00:00'
        ],
        [
            'title' => 'Food Tourism: Culinary Adventures',
            'description' => 'Taste your way around the world with our guide to the best food destinations. From street food to fine dining, satisfy your wanderlust and appetite.',
            'thumbnail' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&h=300&fit=crop',
            'link' => '#',
            'author' => 'Chef Martinez',
            'pubDate' => '2024-06-03 13:30:00'
        ]
    ];
@endphp

<section x-data="travelTipsCarousel()" 
         x-init="init()"
         class="bg-white py-12 px-6 relative">

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-blue-700">Latest Travel Tips</h2>
            
            <!-- Loading indicator -->
            <div x-show="loading" class="flex items-center text-blue-600">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Loading...
            </div>
        </div>

        @if(empty($posts))
            <!-- Empty state -->
            <div class="text-center py-12 bg-gray-50 rounded-lg">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No travel tips available</h3>
                <p class="mt-1 text-sm text-gray-500">Check back later for the latest travel content.</p>
            </div>
        @else
            <div class="relative">
                <!-- Navigation arrows - only show if there are enough items -->
                <template x-if="posts.length > itemsVisible">
                    <div>
                        <!-- Left arrow -->
                        <button @click="scrollLeft"
                                :disabled="!canScrollLeft"
                                :class="{ 'opacity-50 cursor-not-allowed': !canScrollLeft }"
                                class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white border rounded-full p-2 shadow-md hover:bg-gray-100 transition-all duration-200">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <!-- Right arrow -->
                        <button @click="scrollRight"
                                :disabled="!canScrollRight"
                                :class="{ 'opacity-50 cursor-not-allowed': !canScrollRight }"
                                class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white border rounded-full p-2 shadow-md hover:bg-gray-100 transition-all duration-200">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </template>

                <!-- Horizontal scrollable posts container -->
                <div x-ref="slider"
                     @scroll="updateScrollPosition"
                     class="flex overflow-x-auto space-x-4 pb-2 scroll-smooth hide-scrollbar"
                     style="scrollbar-width: none; -ms-overflow-style: none;">
                    
                    @foreach($posts as $index => $post)
                        <article class="flex-none w-72 bg-white border rounded-lg hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                            <a href="{{ $post['link'] }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="block p-4">
                                
                                <!-- Image with lazy loading and error handling -->
                                <div class="relative mb-3 overflow-hidden rounded-lg bg-gray-200">
                                    <img src="{{ $post['thumbnail'] }}"
                                         alt="{{ $post['title'] }}"
                                         loading="lazy"
                                         onerror="this.src='https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=300&fit=crop'; this.onerror=null;"
                                         class="w-full h-40 object-cover transition-transform duration-300 group-hover:scale-105">
                                    
                                    <!-- Gradient overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>

                                <!-- Content -->
                                <div class="space-y-2">
                                    <h3 class="text-lg font-semibold text-blue-600 line-clamp-2 group-hover:text-blue-800 transition-colors">
                                        {{ $post['title'] }}
                                    </h3>

                                    <p class="text-sm text-gray-600 line-clamp-3">
                                        {{ Str::limit(strip_tags($post['description']), 120) }}
                                    </p>

                                    <!-- Meta information -->
                                    <div class="flex justify-between items-center pt-2">
                                        <span class="text-xs text-gray-500">
                                            By {{ $post['author'] }}
                                        </span>
                                        <time class="text-xs text-gray-400" 
                                              datetime="{{ $post['pubDate'] }}">
                                            {{ Carbon\Carbon::parse($post['pubDate'])->diffForHumans() }}
                                        </time>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <!-- Scroll indicators -->
                <template x-if="posts.length > itemsVisible">
                    <div class="flex justify-center mt-4 space-x-2">
                        <template x-for="(indicator, index) in scrollIndicators" :key="index">
                            <button @click="scrollToIndex(index)"
                                    :class="{ 'bg-blue-600': indicator, 'bg-gray-300': !indicator }"
                                    class="w-2 h-2 rounded-full transition-colors duration-200 hover:bg-blue-400">
                            </button>
                        </template>
                    </div>
                </template>
            </div>
        @endif
    </div>
</section>

<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<script>
    function travelTipsCarousel() {
        return {
            loading: false,
            canScrollLeft: false,
            canScrollRight: true,
            currentIndex: 0,
            itemsVisible: 3,
            posts: @json($posts),
            
            init() {
                this.updateScrollPosition();
                this.calculateItemsVisible();
                
                // Update on window resize
                window.addEventListener('resize', () => {
                    this.calculateItemsVisible();
                    this.updateScrollPosition();
                });
            },
            
            calculateItemsVisible() {
                const containerWidth = this.$refs.slider?.clientWidth || 0;
                const itemWidth = 288; // 72 * 4 (w-72 = 18rem = 288px)
                this.itemsVisible = Math.floor(containerWidth / itemWidth) || 1;
            },
            
            scrollLeft() {
                if (this.canScrollLeft) {
                    this.$refs.slider.scrollBy({ left: -300, behavior: 'smooth' });
                }
            },
            
            scrollRight() {
                if (this.canScrollRight) {
                    this.$refs.slider.scrollBy({ left: 300, behavior: 'smooth' });
                }
            },
            
            scrollToIndex(index) {
                const itemWidth = 300; // Including gap
                this.$refs.slider.scrollTo({ 
                    left: index * itemWidth, 
                    behavior: 'smooth' 
                });
            },
            
            updateScrollPosition() {
                if (!this.$refs.slider) return;
                
                const slider = this.$refs.slider;
                const scrollLeft = slider.scrollLeft;
                const scrollWidth = slider.scrollWidth;
                const clientWidth = slider.clientWidth;
                
                this.canScrollLeft = scrollLeft > 0;
                this.canScrollRight = scrollLeft < (scrollWidth - clientWidth - 10);
                
                // Update current index for indicators
                const itemWidth = 300;
                this.currentIndex = Math.round(scrollLeft / itemWidth);
            },
            
            get scrollIndicators() {
                const totalPages = Math.ceil(this.posts.length / this.itemsVisible);
                const currentPage = Math.floor(this.currentIndex / this.itemsVisible);
                
                return Array.from({ length: totalPages }, (_, index) => index === currentPage);
            }
        }
    }
</script>