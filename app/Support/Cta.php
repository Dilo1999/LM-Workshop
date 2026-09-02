<?php

namespace App\Support;

class Cta
{
    /** @return array{quote: string, emergency: string, site_assessment: string, whatsapp: string} */
    public static function urls(): array
    {
        $contact = url('/contact');
        $whatsapp = (string) config('lm-workshop.brand.whatsapp', '');
        $digits = preg_replace('/\D/', '', $whatsapp);
        $message = rawurlencode('Hello LM Workshop, I need engineering support.');

        $whatsappUrl = (strlen($digits) >= 7 && ! str_contains($whatsapp, 'XXX'))
            ? "https://wa.me/{$digits}?text={$message}"
            : $contact.'?urgency=urgent';

        return [
            'quote' => $contact,
            'emergency' => $contact.'?urgency=emergency',
            'site_assessment' => $contact.'?service='.rawurlencode('Other'),
            'whatsapp' => $whatsappUrl,
        ];
    }
}
