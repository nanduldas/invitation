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
        // Prefer JSON textarea input when provided
        $raw = $request->input('available_variables_json');
        $hasJson = is_string($raw) && trim($raw) !== '';

        if (!$hasJson) {
            $raw = $request->input('available_variables');
        }

        // If it's a JSON string, decode it
        if (is_string($raw)) {
            $decoded = json_decode($raw, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $raw = $decoded;
            } else {
                // Fallback: split by commas or newlines ("a,b,c" or multi-line)
                $parts = preg_split('/[,\r\n]+/', $raw);
                $raw = is_array($parts) ? $parts : [];
            }
        }

        if (!is_array($raw)) {
            $raw = [];
        }

        // If associative array like {"client_name": "Client's name"} -> keep keys as variable names
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
        // Normalize available_variables into an array of strings and merge back to request
        $availableVariables = $this->normalizeAvailableVariables($request);

        $validated = $request->validate([
            'key' => 'required|string|max:255|unique:email_templates,key',
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'available_variables' => 'nullable|array',
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

        // Normalize available_variables into an array of strings and merge back to request
        $availableVariables = $this->normalizeAvailableVariables($request);

        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255', Rule::unique('email_templates', 'key')->ignore($emailTemplate->id)],
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'available_variables' => 'nullable|array',
            'from_email' => 'nullable|email|max:255',
            'from_name' => 'nullable|string|max:255',
            'status' => 'boolean'
        ]);

        // Build update payload
        $data = [
            'key' => $validated['key'],
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'body' => $validated['body'],
            'from_email' => $validated['from_email'] ?? null,
            'from_name' => $validated['from_name'] ?? null,
            'status' => (bool) ($validated['status'] ?? false),
            'available_variables' => $availableVariables,
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
