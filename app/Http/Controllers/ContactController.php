<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Services\SeoService;
use App\Services\TelegramService;
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
            'meta_description' => 'Contact LM Workshop for engineering support in the Maldives. Reach our Malé team for marine, industrial and commercial projects. Email sales@lmworkshop.com.',
            'keywords' => [
                'LM Workshop',
                'contact LM Workshop',
                'LM Workshop Malé',
                'sales@lmworkshop.com',
            ],
        ]);

        return view('pages.contact');
    }

    public function store(Request $request, TelegramService $telegram): RedirectResponse
    {
        $urgencyLevels = array_keys(config('lm-workshop.contact.urgency_levels', []));

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'location' => ['required', 'string', 'max:255'],
            'service' => ['nullable', 'string', 'max:255'],
            'equipment_type' => ['required', 'string', 'max:255'],
            'urgency' => ['required', 'string', 'in:' . implode(',', $urgencyLevels)],
            'problem_description' => ['required', 'string', 'max:10000'],
            'attachment' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,doc,docx', 'max:10240'],
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'location.required' => 'Please enter your location or island.',
            'equipment_type.required' => 'Please select the equipment type.',
            'urgency.required' => 'Please select the urgency level.',
            'urgency.in' => 'Please select a valid urgency level.',
            'problem_description.required' => 'Please describe the problem or requirement.',
            'attachment.mimes' => 'Upload a JPG, PNG, PDF, DOC or DOCX file.',
            'attachment.max' => 'The file must not be larger than 10 MB.',
        ]);

        $urgencyLabel = config('lm-workshop.contact.urgency_levels.' . $validated['urgency'], $validated['urgency']);
        $formSubject = collect([
            $validated['urgency'] === 'emergency' ? 'EMERGENCY' : null,
            $validated['location'],
            $validated['equipment_type'],
        ])->filter()->implode(' — ') ?: 'General Inquiry';

        $emailSent = false;
        $telegramSent = false;

        try {
            Mail::to(config('mail.contact_to', config('mail.from.address')))
                ->send(new ContactFormMail(
                    senderName: $validated['name'],
                    senderEmail: $validated['email'],
                    formSubject: $formSubject,
                    company: $validated['company'] ?? null,
                    phone: $validated['phone'] ?? null,
                    location: $validated['location'],
                    service: $validated['service'] ?? null,
                    equipmentType: $validated['equipment_type'],
                    urgency: $urgencyLabel,
                    problemDescription: $validated['problem_description'],
                    attachment: $request->file('attachment'),
                ));
            $emailSent = true;
        } catch (\Throwable $e) {
            report($e);
        }

        try {
            $e = fn (?string $v) => e($v ?? '—');
            $telegramSent = $telegram->send(
                ($validated['urgency'] === 'emergency' ? '🚨 <b>EMERGENCY</b>' . "\n" : '')
                . '<b>New contact inquiry</b>' . "\n\n"
                . '<b>Name:</b> ' . $e($validated['name']) . "\n"
                . '<b>Company:</b> ' . $e($validated['company'] ?? null) . "\n"
                . '<b>Phone:</b> ' . $e($validated['phone'] ?? null) . "\n"
                . '<b>Email:</b> ' . $e($validated['email']) . "\n"
                . '<b>Location:</b> ' . $e($validated['location']) . "\n"
                . '<b>Service:</b> ' . $e($validated['service'] ?? null) . "\n"
                . '<b>Equipment:</b> ' . $e($validated['equipment_type']) . "\n"
                . '<b>Urgency:</b> ' . $e($urgencyLabel) . "\n\n"
                . '<b>Problem:</b>' . "\n" . $e($validated['problem_description']),
                $request->file('attachment'),
            );
        } catch (\Throwable $ex) {
            report($ex);
        }

        if (! $emailSent && ! $telegramSent) {
            return back()
                ->withInput()
                ->with('contact_error', 'We could not send your inquiry right now. Please email us directly at ' . config('lm-workshop.brand.email') . '.');
        }

        return redirect()->route('contact')->with('contact_success', true);
    }
}
