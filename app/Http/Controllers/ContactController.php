<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Services\SeoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(SeoService $seo): View
    {
        $seo->applyForPage('contact', [
            'meta_title' => 'Contact — LM Workshop',
            'meta_description' => 'Contact LM Workshop for emergency engineering support, preventive maintenance or technical expertise for your next project.',
        ]);

        return view('pages.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'service' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:10000'],
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        $subject = $validated['service'] ?: 'General Inquiry';
        $body = collect([
            $validated['company'] ? "Company: {$validated['company']}" : null,
            $validated['phone'] ? "Phone: {$validated['phone']}" : null,
            $validated['service'] ? "Service: {$validated['service']}" : null,
            '',
            $validated['message'] ?? '',
        ])->filter(fn ($line) => $line !== null)->implode("\n");

        Mail::to(config('mail.contact_to', config('mail.from.address')))
            ->send(new ContactFormMail(
                senderName: $validated['name'],
                senderEmail: $validated['email'],
                formSubject: $subject,
                messageBody: $body,
            ));

        return redirect()->route('contact')->with('contact_success', true);
    }
}
