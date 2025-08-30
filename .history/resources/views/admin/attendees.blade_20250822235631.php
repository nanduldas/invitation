@extends('layouts.app')

@section('title', 'Admin - Attendees List')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">📋 Event Attendees Management</h1>
        <p class="text-white/80">Manage and view all registered attendees for both events</p>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Haldi Event Attendees -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden">
            <div class="gradient-haldi-deep p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold flex items-center">
                            🌺 Haldi Ceremony
                        </h2>
                        <p class="text-white/90 mt-1">Registered Attendees</p>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold">{{ $haldiAttendees->count() }}</div>
                        <div class="text-sm text-white/80">Total</div>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                @if($haldiAttendees->count() > 0)
                    <div class="space-y-3 max-h-96 overflow-y-auto">
                        @foreach($haldiAttendees as $index => $attendee)
                            <div class="flex items-center justify-between p-3 bg-amber-50 rounded-lg border border-amber-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $attendee->name }}</div>
                                        <div class="text-sm text-gray-600">{{ $attendee->phone }}</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-gray-500">Registered</div>
                                    <div class="text-sm font-medium text-gray-700">
                                        {{ $attendee->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <button onclick="exportAttendees('haldi')" 
                                class="w-full px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                            📄 Export Haldi Attendees List
                        </button>
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="text-6xl mb-4">🌺</div>
                        <p class="text-gray-500 text-lg">No attendees registered yet</p>
                        <p class="text-gray-400 text-sm mt-2">Attendees will appear here once they register</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Onam Event Attendees -->
        <div class="bg-white/95 rounded-xl shadow-xl overflow-hidden">
            <div class="gradient-onam relative">
                <div class="onam-overlay p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold flex items-center drop-shadow-lg">
                                🌾 Onam Festival
                            </h2>
                            <p class="text-white/90 mt-1 drop-shadow">Registered Attendees</p>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold drop-shadow-lg">{{ $onamAttendees->count() }}</div>
                            <div class="text-sm text-white/80 drop-shadow">Total</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                @if($onamAttendees->count() > 0)
                    <div class="space-y-3 max-h-96 overflow-y-auto">
                        @foreach($onamAttendees as $index => $attendee)
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $attendee->name }}</div>
                                        <div class="text-sm text-gray-600">{{ $attendee->phone }}</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-gray-500">Registered</div>
                                    <div class="text-sm font-medium text-gray-700">
                                        {{ $attendee->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <button onclick="exportAttendees('onam')" 
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            📄 Export Onam Attendees List
                        </button>
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="text-6xl mb-4">🌾</div>
                        <p class="text-gray-500 text-lg">No attendees registered yet</p>
                        <p class="text-gray-400 text-sm mt-2">Attendees will appear here once they register</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Summary Statistics -->
    <div class="mt-8 bg-white/95 rounded-xl shadow-xl p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">📊 Summary Statistics</h3>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-amber-600">{{ $haldiAttendees->count() }}</div>
                <div class="text-gray-600">Haldi Attendees</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600">{{ $onamAttendees->count() }}</div>
                <div class="text-gray-600">Onam Attendees</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-green-600">{{ $haldiAttendees->count() + $onamAttendees->count() }}</div>
                <div class="text-gray-600">Total Registrations</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-gray-800">
                    {{ $haldiAttendees->merge($onamAttendees)->unique('phone')->count() }}
                </div>
                <div class="text-gray-600">Unique People</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function exportAttendees(event) {
        // This would typically make an AJAX call to export the data
        // For now, we'll create a simple CSV export
        let attendees = [];
        let filename = event + '_attendees_' + new Date().toISOString().split('T')[0] + '.csv';
        
        if (event === 'haldi') {
            @foreach($haldiAttendees as $attendee)
                attendees.push({
                    name: "{{ $attendee->name }}",
                    phone: "{{ $attendee->phone }}",
                    registered: "{{ $attendee->created_at->format('Y-m-d H:i:s') }}"
                });
            @endforeach
        } else {
            @foreach($onamAttendees as $attendee)
                attendees.push({
                    name: "{{ $attendee->name }}",
                    phone: "{{ $attendee->phone }}",
                    registered: "{{ $attendee->created_at->format('Y-m-d H:i:s') }}"
                });
            @endforeach
        }
        
        // Create CSV content
        let csvContent = "Name,Phone,Registered Date\n";
        attendees.forEach(attendee => {
            csvContent += `"${attendee.name}","${attendee.phone}","${attendee.registered}"\n`;
        });
        
        // Download CSV
        const blob = new Blob([csvContent], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);
        
        alert(`${event.charAt(0).toUpperCase() + event.slice(1)} attendees list exported successfully!`);
    }
</script>
@endsection
