@extends('layouts.app')

@section('title', ucfirst($event) . ' Event Details')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('home') }}" class="inline-flex items-center text-white/80 hover:text-white transition-colors">
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
                        <div class="text-8xl mb-4">🌺</div>
                        <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">Haldi Ceremony</h1>
                        <p class="text-xl mt-2 drop-shadow">A Sacred & Joyful Celebration</p>
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
                            Join us for an afternoon filled with laughter, music, traditional songs, and the 
                            warm embrace of family and friends. The golden glow of turmeric will bless the 
                            couple as they prepare for their new journey.
                        </p>
                        
                        <h3 class="text-lg font-semibold text-gold mb-2">What to Expect:</h3>
                        <ul class="text-gray-600 space-y-1">
                            <li>• Traditional turmeric application ceremony</li>
                            <li>• Folk music and dancing</li>
                            <li>• Delicious Indian snacks and sweets</li>
                            <li>• Photography and memories</li>
                            <li>• Warm, festive atmosphere</li>
                        </ul>
                    </div>
                    
                    <div>
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
                                    <div class="text-gray-600">Traditional afternoon timing</div>
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
                                <span class="text-2xl mr-3">👗</span>
                                <div>
                                    <div class="font-semibold text-gold">Dress Code</div>
                                    <div class="text-gray-600">Traditional Indian wear preferred</div>
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
                        <h2 class="text-2xl font-bold text-gold-shining mb-4">About Onam</h2>
                        <p class="text-gray-600 mb-4">
                            Onam is the most important festival of Kerala, celebrating the golden age of King Mahabali. 
                            This 10-day harvest festival brings together families and communities to celebrate prosperity, 
                            unity, and the rich cultural heritage of Kerala.
                        </p>
                        <p class="text-gray-600 mb-4">
                            Experience the magic of Kerala through traditional Sadhya (feast), beautiful Pookalam 
                            (flower carpets), classical Kathakali performances, and the joyful spirit that makes 
                            Onam truly special.
                        </p>
                        
                        <h3 class="text-lg font-semibold text-gold mb-2">Festival Highlights:</h3>
                        <ul class="text-gray-600 space-y-1">
                            <li>• Traditional Sadhya served on banana leaves</li>
                            <li>• Pookalam (flower arrangement) competition</li>
                            <li>• Kathakali and classical dance performances</li>
                            <li>• Traditional games and activities</li>
                            <li>• Cultural programs and music</li>
                        </ul>
                    </div>
                    
                    <div>
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
                                    <div class="text-gray-600">Full day celebration</div>
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
                                <span class="text-2xl mr-3">🍽️</span>
                                <div>
                                    <div class="font-semibold text-gold">Special</div>
                                    <div class="text-gray-600">Authentic Kerala Sadhya included</div>
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
                    <h3 class="text-xl font-bold text-gold-shining mb-3">The Legend of King Mahabali</h3>
                    <p class="text-gray-700">
                        Onam celebrates the homecoming of the beloved King Mahabali, under whose reign Kerala experienced 
                        its golden age. Legend says that Mahabali was so beloved that he was granted permission to visit 
                        his people once every year. Onam marks this annual visit, when Kerala welcomes their king with 
                        flowers, feasts, and celebrations.
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
