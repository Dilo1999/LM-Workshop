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
            'meta_title' => 'LM Workshop | Contact — Engineering Support in Malé, Maldives',
            'meta_description' => 'Contact LM Workshop for engineering support in the Maldives. Reach our Malé team for marine, industrial and commercial projects. Email info@lmworkshop.com.',
            'keywords' => [
                'LM Workshop',
                'contact LM Workshop',
                'LM Workshop Malé',
                'info@lmworkshop.com',
            ],
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

        try {
            Mail::to(config('mail.contact_to', config('mail.from.address')))
                ->send(new ContactFormMail(
                    senderName: $validated['name'],
                    senderEmail: $validated['email'],
                    formSubject: $subject,
                    messageBody: $body,
                ));
        } catch (\Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('contact_error', 'We could not send your inquiry right now. Please email us directly at ' . config('lm-workshop.brand.email') . '.');
        }

        return redirect()->route('contact')->with('contact_success', true);
    }
}
