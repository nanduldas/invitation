@extends('layouts.app')

@section('title', 'Create Email Template')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Create Email Template</h1>
        <a href="{{ route('admin.email-templates.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
            Back to Templates
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.email-templates.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Template Details -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Template Details</h3>
                    
                    <div>
                        <label for="key" class="block text-sm font-medium text-gray-700 mb-2">Template Key</label>
                        <input type="text" 
                               id="key" 
                               name="key" 
                               value="{{ old('key') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Template Name</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Email Subject</label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               value="{{ old('subject') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="from_name" class="block text-sm font-medium text-gray-700 mb-2">From Name</label>
                        <input type="text" 
                               id="from_name" 
                               name="from_name" 
                               value="{{ old('from_name') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="from_email" class="block text-sm font-medium text-gray-700 mb-2">From Email</label>
                        <input type="email" 
                               id="from_email" 
                               name="from_email" 
                               value="{{ old('from_email') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="status" 
                                   value="1"
                                   {{ old('status', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                    </div>
                </div>

                <!-- Available Variables -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Available Variables</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Add variables that can be used in the email template.
                    </p>
                    
                    <div id="variables-container">
                        <!-- Variables will be added here -->
                    </div>
                    
                    <button type="button" 
                            onclick="addVariable()"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                        Add Variable
                    </button>
                </div>
            </div>

            <!-- Email Body -->
            <div class="mt-6">
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Email Body</label>
                <textarea id="body" 
                          name="body" 
                          rows="15"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                          required>{{ old('body') }}</textarea>
                <p class="text-sm text-gray-600 mt-2">
                    Use variables in the format: {{ '{{variable_name}}' }}
                </p>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.email-templates.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    Create Template
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function addVariable() {
    const container = document.getElementById('variables-container');
    const div = document.createElement('div');
    div.className = 'variable-item flex items-center space-x-2 mb-2';
    div.innerHTML = `
        <input type="text" 
               name="available_variables[]" 
               class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="Variable name (e.g., client_name)">
        <button type="button" 
                onclick="removeVariable(this)"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">
            Remove
        </button>
    `;
    container.appendChild(div);
}

function removeVariable(button) {
    button.parentElement.remove();
}
</script>
@endsection
