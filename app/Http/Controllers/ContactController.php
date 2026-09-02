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
        } catch (\Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('contact_error', 'We could not send your inquiry right now. Please email us directly at ' . config('lm-workshop.brand.email') . '.');
        }

        return redirect()->route('contact')->with('contact_success', true);
    }
}
