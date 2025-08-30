<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class EmailTemplateController extends Controller
{
    /**
     * Normalize the available_variables input into a clean array of strings (variable names).
     */
    private function normalizeAvailableVariables(Request $request): array
    {
        $raw = $request->input('available_variables');

        // Case 1: JSON string in a textarea
        if (is_string($raw)) {
            $decoded = json_decode($raw, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $raw = $decoded;
            } else {
                // Fallback: split by commas or newlines
                $parts = preg_split('/[,\r\n]+/', $raw);
                $raw = is_array($parts) ? $parts : [];
            }
        }

        // Case 2: If still not array, default to empty array
        if (!is_array($raw)) {
            $raw = [];
        }

        // If associative array (e.g. {"client_name": "Client's name"}), keep the keys
        $isAssoc = array_keys($raw) !== range(0, count($raw) - 1);
        $vars = $isAssoc ? array_keys($raw) : $raw;

        // Clean values: strings only, trim, remove empties and duplicates
        $vars = array_values(array_unique(array_filter(array_map(function ($v) {
            if (!is_string($v)) return null;
            $t = trim($v);
            return $t === '' ? null : $t;
        }, $vars))));

        // Merge back into the request so 'array' validation can succeed
        $request->merge(['available_variables' => $vars]);

        return $vars;
    }

    /**
     * Display a listing of email templates.
     */
    public function index()
    {
        $templates = EmailTemplate::all();
        return view('admin.email-templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new email template.
     */
    public function create()
    {
        return view('admin.email-templates.create');
    }

    /**
     * Store a newly created email template.
     */
    public function store(Request $request)
    {
        // Handle available_variables - ensure it's always an array
        $availableVariables = $request->input('available_variables', []);
        if (!is_array($availableVariables)) {
            $availableVariables = [];
        }
        // Filter out empty values
        $availableVariables = array_filter($availableVariables, function($var) {
            return !empty(trim($var));
        });

        $validated = $request->validate([
            'key' => 'required|string|max:255|unique:email_templates,key',
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'from_email' => 'nullable|email|max:255',
            'from_name' => 'nullable|string|max:255',
            'status' => 'boolean'
        ]);

        // Add the processed available_variables to validated data
        $validated['available_variables'] = $availableVariables;

        EmailTemplate::create($validated);

        return redirect()->route('admin.email-templates.index')
            ->with('success', 'Email template created successfully.');
    }

    /**
     * Display the specified email template.
     */
    public function show(EmailTemplate $emailTemplate)
    {
        return view('admin.email-templates.show', compact('emailTemplate'));
    }

    /**
     * Show the form for editing the specified email template.
     */
    public function edit($key)
    {
        try {
            $emailTemplate = EmailTemplate::where('key', $key)->firstOrFail();

            // Debug: Check the available_variables field
            Log::info('Edit template - available_variables:', [
                'key' => $key,
                'available_variables' => $emailTemplate->available_variables,
                'is_array' => is_array($emailTemplate->available_variables),
                'type' => gettype($emailTemplate->available_variables)
            ]);

            return view('admin.email-templates.edit', compact('emailTemplate'));
        } catch (\Exception $e) {
            Log::error('Error in edit method:', ['error' => $e->getMessage()]);
            return redirect()->route('admin.email-templates.index')
                ->with('error', 'Error loading template: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified email template.
     */
    public function update(Request $request, $key)
    {
        $emailTemplate = EmailTemplate::where('key', $key)->firstOrFail();

        // Debug: Log the request data
        Log::info('Email template update request:', $request->all());

        // Handle available_variables - ensure it's always an array
        $availableVariables = $request->input('available_variables', []);
        if (!is_array($availableVariables)) {
            $availableVariables = [];
        }
        // Filter out empty values
        $availableVariables = array_filter($availableVariables, function($var) {
            return !empty(trim($var));
        });

        // Temporarily remove validation to debug
        $data = [
            'key' => $request->input('key'),
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
            'from_email' => $request->input('from_email'),
            'from_name' => $request->input('from_name'),
            'status' => $request->has('status') ? true : false,
            'available_variables' => $availableVariables
        ];

        $emailTemplate->update($data);

        return redirect()->route('admin.email-templates.index')
            ->with('success', 'Email template updated successfully.');
    }

    /**
     * Remove the specified email template.
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        $emailTemplate->delete();

        return redirect()->route('admin.email-templates.index')
            ->with('success', 'Email template deleted successfully.');
    }
}
