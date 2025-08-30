@extends('layouts.app')

@section('title', 'Welcome - Event Invitations')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">
            🎊 Join Our Celebrations! 🎊
        </h1>
        <p class="text-xl text-white/90 mb-8">
            We're hosting two amazing events and would love to have you join us!
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Haldi Event Card -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden card-hover">
            <div class="gradient-haldi h-48 flex items-center justify-center">
                <div class="text-center text-white">
                    <div class="text-6xl mb-4">🌺</div>
                    <h2 class="text-3xl font-bold">Haldi Ceremony</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">A Traditional Celebration</h3>
                    <p class="text-gray-600 mb-4">
                        Join us for a vibrant Haldi ceremony filled with joy, laughter, and beautiful traditions. 
                        This auspicious occasion brings families together to celebrate with turmeric, music, and dance.
                    </p>
                    <div class="text-sm text-gray-500 space-y-1">
                        <p>📅 <strong>Date:</strong> Coming Soon</p>
                        <p>📍 <strong>Venue:</strong> To be announced</p>
                        <p>⏰ <strong>Time:</strong> Traditional timings</p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="text-center mb-4">
                        <div class="text-2xl font-bold text-yellow-600 attendee-count" data-event="haldi">{{ $haldiCount }}</div>
                        <div class="text-sm text-gray-500">People Attending</div>
                    </div>
                    <div class="space-y-3">
                        <a href="{{ route('event.show', 'haldi') }}" 
                           class="block w-full px-4 py-3 bg-yellow-600 text-white text-center rounded-lg hover:bg-yellow-700 transition-colors font-semibold">
                            🌺 View Details
                        </a>
                        <button onclick="openModal('haldi')" 
                                class="w-full px-4 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors font-semibold">
                            I'm Attending! 🎉
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onam Event Card -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden card-hover">
            <div class="gradient-onam h-48 flex items-center justify-center">
                <div class="text-center text-white">
                    <div class="text-6xl mb-4">🌾</div>
                    <h2 class="text-3xl font-bold">Onam Festival</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">The Harvest Festival</h3>
                    <p class="text-gray-600 mb-4">
                        Experience the rich culture of Kerala with our Onam celebration! Enjoy traditional Sadhya, 
                        beautiful Pookalam designs, classical dances, and the spirit of King Mahabali.
                    </p>
                    <div class="text-sm text-gray-500 space-y-1">
                        <p>📅 <strong>Date:</strong> Coming Soon</p>
                        <p>📍 <strong>Venue:</strong> To be announced</p>
                        <p>🍽️ <strong>Special:</strong> Traditional Sadhya feast</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600 attendee-count" data-event="onam">{{ $onamCount }}</div>
                        <div class="text-sm text-gray-500">Attendees</div>
                    </div>
                    <div class="space-x-2">
                        <a href="{{ route('event.show', 'onam') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            View Details
                        </a>
                        <button onclick="openModal('onam')" 
                                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                            I'm Attending! 🌾
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <div class="bg-white/90 rounded-xl p-8 inline-block">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Why Join Us?</h3>
            <div class="grid md:grid-cols-3 gap-6 text-center">
                <div>
                    <div class="text-3xl mb-2">🎭</div>
                    <h4 class="font-semibold text-gray-700">Cultural Experience</h4>
                    <p class="text-sm text-gray-600">Immerse in authentic traditions</p>
                </div>
                <div>
                    <div class="text-3xl mb-2">🍛</div>
                    <h4 class="font-semibold text-gray-700">Delicious Food</h4>
                    <p class="text-sm text-gray-600">Traditional cuisine & treats</p>
                </div>
                <div>
                    <div class="text-3xl mb-2">👨‍👩‍👧‍👦</div>
                    <h4 class="font-semibold text-gray-700">Family Fun</h4>
                    <p class="text-sm text-gray-600">Perfect for all ages</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
