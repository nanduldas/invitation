<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Event Invitations')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #F8F6F0 0%, #FFF8DC 25%, #FFFAF0 50%, #FAF0E6 75%, #FDF5E6 100%);
        }
        .gradient-haldi {
            background: linear-gradient(135deg, #FF6B35 0%, #F7931E 25%, #FFD700 50%, #FFA500 75%, #FF8C00 100%);
        }
        .gradient-haldi-deep {
            background: linear-gradient(135deg, #B8860B 0%, #DAA520 25%, #FFD700 50%, #FFA500 75%, #FF6347 100%);
        }
        .bg-haldi-theme {
            background-image: url('/images/haldi-background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .haldi-overlay {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.9) 0%, rgba(255, 165, 0, 0.8) 50%, rgba(255, 140, 0, 0.9) 100%);
        }
        .gradient-onam {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        .text-gold {
            color: #FFD700;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }
        .text-gold-shining {
            background: linear-gradient(45deg, #FFD700, #FFA500, #FFD700, #DAA520, #FFD700);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: goldShine 3s ease-in-out infinite;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
        }
        @keyframes goldShine {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .modal {
            transition: opacity 0.25s ease;
        }
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <nav class="bg-white/10 backdrop-blur-sm border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-white text-xl font-bold">
                        🎉 Event Invitations
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-white/80 hover:text-white transition-colors">
                        Home
                    </a>
                    <a href="{{ route('admin.attendees') }}" class="text-white/80 hover:text-white transition-colors">
                        Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>

    <!-- Registration Modal -->
    <div id="registrationModal" class="modal fixed inset-0 z-50 hidden">
        <div class="modal-backdrop fixed inset-0" onclick="closeModal()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 transform transition-all">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Register for Event</h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <form id="registrationForm">
                        @csrf
                        <input type="hidden" id="eventType" name="event" value="">
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="mb-6">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="flex space-x-3">
                            <button type="button" onclick="closeModal()" 
                                    class="flex-1 px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" 
                                    class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(event) {
            document.getElementById('eventType').value = event;
            document.getElementById('registrationModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('registrationModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.getElementById('registrationForm').reset();
        }

        $(document).ready(function() {
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: '{{ route("register") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        if (response.attendee_count) {
                            // Update the count on the page
                            const event = $('#eventType').val();
                            $('.attendee-count[data-event="' + event + '"]').text(response.attendee_count);
                        }
                        closeModal();
                    },
                    error: function(xhr) {
                        const response = JSON.parse(xhr.responseText);
                        alert(response.message || 'An error occurred. Please try again.');
                    }
                });
            });
        });

        // ESC key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>

    @yield('scripts')
</body>
</html>
