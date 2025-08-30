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
        $emailTemplate = EmailTemplate::where('key', $key)->firstOrFail();
        return view('admin.email-templates.edit', compact('emailTemplate'));
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

        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255', Rule::unique('email_templates', 'key')->ignore($emailTemplate->id)],
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'from_email' => 'nullable|email|max:255',
            'from_name' => 'nullable|string|max:255',
            'status' => 'boolean'
        ]);

        // Add the processed available_variables to validated data
        $validated['available_variables'] = $availableVariables;

        $emailTemplate->update($validated);

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
