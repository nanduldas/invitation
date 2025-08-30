@extends('layouts.app')

@section('title', 'Welcome - Event Invitations')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-6xl font-bold text-gold-shining mb-4">
            🎊 Join Our Celebrations! 🎊
        </h1>
        <p class="text-xl text-gray-700 mb-8">
            We're hosting two amazing events and would love to have you join us!
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Haldi Event Card -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden card-hover">
            <div class="bg-haldi-theme h-48 relative">
                <div class="haldi-overlay h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h2 class="text-3xl font-bold drop-shadow-lg">Haldi Ceremony</h2>
                        <p class="text-lg mt-1 drop-shadow">Golden Sunflower Blessings</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-gold-shining mb-2">Sunflower Sacred Celebration</h3>
                    <p class="text-gray-600 mb-4">
                        Join us for a vibrant Haldi ceremony surrounded by beautiful sunflowers! This auspicious 
                        occasion brings families together to celebrate with golden turmeric, radiant sunflower 
                        decorations, traditional music, and joyful dance.
                    </p>
                    <div class="text-sm text-gray-500 space-y-1">
                        <p>📅 <strong>Date:</strong> 03 September 2025</p>
                        <p>📍 <strong>Venue:</strong> <a href="https://maps.app.goo.gl/8pJX4TCWVV1bqgzKA" target="_blank" class="text-gold hover:text-gold-shining underline">View Location on Map</a></p>
                        <p>🌻 <strong>Theme:</strong> Golden Sunflower Garden</p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="text-center mb-4">
                        <div class="text-2xl font-bold text-gold attendee-count" data-event="haldi">{{ $haldiCount }}</div>
                        <div class="text-sm text-amber-600">People Attending</div>
                    </div>
                    <div class="space-y-3">
                        <a href="{{ route('event.show', 'haldi') }}" 
                           class="block w-full px-4 py-3 btn-gold-light text-center rounded-lg font-semibold">
                            🌺 View Details
                        </a>
                        <button onclick="openModal('haldi')" 
                                class="w-full px-4 py-3 btn-gold rounded-lg font-semibold">
                            I'm Attending! 🎉
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onam Event Card -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden card-hover">
            <div class="bg-onam-theme h-48 relative">
                <div class="onam-overlay h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h2 class="text-3xl font-bold drop-shadow-lg">Onam Festival</h2>
                        <p class="text-lg mt-1 drop-shadow">Onam Celebration (Post-Wedding)</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-gold-shining mb-2">The Musical Festival</h3>
                    <p class="text-gray-600 mb-4">
                        Join King Mahabali's modern celebration! Experience our most treasured festival with 
                        a contemporary twist - featuring DJ music, traditional Sadhya feast, vibrant Pookalam designs, 
                        classical dance performances, and the joyous spirit of our beloved king's homecoming.
                    </p>
                    <div class="text-sm text-gray-500 space-y-1">
                        <p>📅 <strong>Date:</strong> Coming Soon</p>
                        <p>📍 <strong>Venue:</strong> To be announced</p>
                        <p>� <strong>Special:</strong> DJ Music & Traditional Sadhya</p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="text-center mb-4">
                        <div class="text-2xl font-bold text-gold attendee-count" data-event="onam">{{ $onamCount }}</div>
                        <div class="text-sm text-amber-600">People Attending</div>
                    </div>
                    <div class="space-y-3">
                        <a href="{{ route('event.show', 'onam') }}" 
                           class="block w-full px-4 py-3 btn-gold-light text-center rounded-lg font-semibold">
                            🌾 View Details
                        </a>
                        <button onclick="openModal('onam')" 
                                class="w-full px-4 py-3 btn-gold rounded-lg font-semibold">
                            I'm Attending! 🌾
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
            <div class="text-center">
        <div class="bg-white/90 rounded-xl p-6 inline-block border border-gray-200/50">
            <h3 class="text-xl font-bold text-gold-shining mb-4">📞 Questions? Contact Us!</h3>
            <p class="text-gold font-medium">For any queries, feel free to reach out</p>
            <p class="text-gray-600 text-sm mt-2">We're here to help make your experience wonderful!</p>
        </div>
    </div>
    </div>
</div>
@endsection
