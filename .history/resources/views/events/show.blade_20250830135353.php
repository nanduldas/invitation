@extends('layouts.app')

@section('title', ucfirst($event) . ' Event Details')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('home') }}" class="inline-flex items-center text-black hover:text-white transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Events
        </a>
    </div>

    @if($event === 'haldi')
        <!-- Haldi Event Details -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden">
            <div class="bg-haldi-theme h-64 relative">
                <div class="haldi-overlay h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">Haldi Ceremony</h1>
                        <p class="text-xl mt-2 drop-shadow">Golden Sunflower Blessings</p>
                    </div>
                </div>
            </div>
            
            <div class="p-8">
                <div class="grid md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gold-shining mb-4">About the Ceremony</h2>
                        <p class="text-gray-600 mb-4">
                            The Haldi ceremony is one of the most cherished pre-wedding rituals in Indian culture. 
                            This beautiful tradition involves applying turmeric paste to the bride and groom, 
                            symbolizing purification, protection, and the blessing of a bright future together.
                        </p>
                        <p class="text-gray-600 mb-4">
                            Join us in our enchanting sunflower garden setting for an afternoon filled with golden 
                            sunshine, laughter, music, traditional songs, and the warm embrace of family and friends. 
                            The golden glow of both turmeric and sunflowers will bless the couple as they prepare 
                            for their new journey.
                        </p>
                        
                        <h3 class="text-lg font-semibold text-gold mb-2">What to Expect:</h3>
                        <ul class="text-gray-600 space-y-1">
                            <li>• Traditional turmeric application ceremony</li>
                            <li>• Beautiful sunflower garden decorations</li>
                            <li>• Music and dancing</li>
                            <li>• Delicious Indian snacks and sweets</li>
                            <li>• Photography in the sunflower setting</li>
                            <li>• Warm, festive golden atmosphere</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h2 class="text-2xl font-bold text-gold-shining mb-4">Event Details</h2>
                        <div class="bg-gradient-to-br from-yellow-50 to-amber-50 rounded-lg p-6 space-y-4 border border-yellow-200/50">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">📅</span>
                                <div>
                                    <div class="font-semibold text-gold">Date</div>
                                    <div class="text-gray-600">03 September 2025</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">⏰</span>
                                <div>
                                    <div class="font-semibold text-gold">Time</div>
                                    <div class="text-gray-600">2PM to 5PM</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">📍</span>
                                <div>
                                    <div class="font-semibold text-gold">Venue</div>
                                <a href="https://maps.app.goo.gl/8pJX4TCWVV1bqgzKA" target="_blank" class="text-gold hover:text-gold-shining underline">View Location on Map</a></p>
                                  
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">👗</span>
                                <div>
                                    <div class="font-semibold text-gold">Dress Code</div>
                                    <div class="text-gray-600">Traditional Indian wear preferred (Yellow)</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 text-center">
                            <div class="bg-gradient-to-br from-yellow-100 to-amber-100 rounded-lg p-4 mb-4 border border-yellow-200/50">
                                <div class="text-3xl font-bold text-gold attendee-count" data-event="haldi">{{ $attendeesCount }}</div>
                                <div class="text-amber-600">People Attending</div>
                            </div>
                            <button onclick="openModal('haldi')" 
                                    class="w-full px-6 py-3 btn-gold rounded-lg text-lg font-semibold">
                                🎉 I'm Attending This Celebration!
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-yellow-100 to-amber-100 rounded-lg p-6 border border-yellow-200/50">
                    <h3 class="text-xl font-bold text-gold-shining mb-3">Traditional Significance</h3>
                    <p class="text-gray-700">
                        Turmeric has been used in Indian ceremonies for thousands of years. It's believed to bring 
                        good luck, ward off evil, and promote health and prosperity. The Haldi ceremony is not just 
                        a ritual, but a celebration of love, family bonds, and the beginning of a beautiful journey.
                    </p>
                </div>
            </div>
        </div>
    @else
        <!-- Onam Event Details -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden">
            <div class="bg-onam-theme h-64 relative">
                <div class="onam-overlay h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">Onam Festival</h1>
                        <p class="text-xl mt-2 drop-shadow">Kerala's Musical Celebration</p>
                    </div>
                </div>
            </div>
            
            <div class="p-8">
                <div class="grid md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gold-shining mb-4">About Our Special Onam</h2>
                        <p class="text-gray-600 mb-4">
                            Join us for an extraordinary Onam celebration as our beloved bride and groom celebrate 
                            this auspicious festival with their families and closest loved ones! This isn't just any 
                            Onam - it's a special pre-wedding celebration that honors King Mahabali's homecoming 
                            while blessing the couple's new journey together.
                        </p>
                        <p class="text-gray-600 mb-4">
                            We've crafted the perfect day that begins with authentic Kerala traditions - beautiful 
                            Pookalam creation, traditional Sadhya feast served on banana leaves, and cherished 
                            cultural games that bring families together. As the sun sets, we'll transform into 
                            a vibrant dance floor with our DJ King Mahabali spinning the beats that unite 
                            generations in celebration!
                        </p>
                        <p class="text-gray-600 mb-4">
                            <strong>From Traditional Roots to Modern Beats:</strong> Experience the magic as we 
                            start with Kerala's timeless customs and crescendo into an unforgettable dance party 
                            under the stars. It's tradition meets celebration - exactly how love should be honored!
                        </p>
                        
                        <h3 class="text-lg font-semibold text-gold mb-2">Festival Highlights:</h3>
                        <ul class="text-gray-600 space-y-1">
                            <li>• 🌺 Traditional Pookalam competition with family teams</li>
                            <li>• 🍛 Authentic Kerala Sadhya served on banana leaves</li>
                            <li>• 🎯 Classic Onam games: Kaikottikali, Pulikali & more</li>
                            <li>• 🎭 Kathakali performances & cultural showcases</li>
                            <li>• 🎵 DJ music transition from traditional to modern hits</li>
                            <li>• 💃 Dance floor finale with rocking music for all ages</li>
                            <li>• 📸 Special photo sessions capturing precious family moments</li>
                        </ul>
                    </div>                    <div>
                        <h2 class="text-2xl font-bold text-gold-shining mb-4">Event Details</h2>
                        <div class="bg-gradient-to-br from-yellow-50 to-amber-50 rounded-lg p-6 space-y-4 border border-yellow-200/50">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">📅</span>
                                <div>
                                    <div class="font-semibold text-gold">Date</div>
                                    <div class="text-gray-600">To be announced soon</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">⏰</span>
                                <div>
                                    <div class="font-semibold text-gold">Time</div>
                                    <div class="text-gray-600">Full day celebration with DJ sets</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">📍</span>
                                <div>
                                    <div class="font-semibold text-gold">Venue</div>
                                    <div class="text-gray-600">Location details coming soon</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">�</span>
                                <div>
                                    <div class="font-semibold text-gold">Entertainment</div>
                                    <div class="text-gray-600">DJ Music & Traditional Sadhya</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 text-center">
                            <div class="bg-gradient-to-br from-yellow-100 to-amber-100 rounded-lg p-4 mb-4 border border-yellow-200/50">
                                <div class="text-3xl font-bold text-gold attendee-count" data-event="onam">{{ $attendeesCount }}</div>
                                <div class="text-amber-600">People Attending</div>
                            </div>
                            <button onclick="openModal('onam')" 
                                    class="w-full px-6 py-3 btn-gold rounded-lg text-lg font-semibold">
                                🌾 Join Our Onam Celebration!
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-yellow-100 to-amber-100 rounded-lg p-6 border border-yellow-200/50">
                    <h3 class="text-xl font-bold text-gold-shining mb-3">The Legend of DJ King Mahabali</h3>
                    <p class="text-gray-700">
                        King Mahabali returns in style! Our beloved king, who once ruled Kerala's golden age, 
                        now spins the perfect beats to celebrate his annual homecoming. This modern twist on 
                        the traditional Onam story brings together the best of both worlds - honoring our 
                        heritage while embracing contemporary celebration. Welcome back, Your Majesty! 🎵👑
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
