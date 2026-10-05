<?php

namespace App\Support;

class Cta
{
    /** @return array{quote: string, emergency: string, site_assessment: string, whatsapp: string, general_whatsapp: string} */
    public static function urls(): array
    {
        $contact = url('/contact');
        $message = rawurlencode('Hello LM Workshop, I need engineering support.');

        $engineerDigits = self::digits('lm-workshop.brand.engineer_whatsapp');
        $generalDigits = self::digits('lm-workshop.brand.whatsapp');
        $emergencyDigits = self::digits('lm-workshop.brand.emergency_phone');

        return [
            'quote' => $contact,
            'emergency' => $emergencyDigits !== '' ? "tel:+{$emergencyDigits}" : $contact.'?urgency=emergency',
            'site_assessment' => $contact.'?service='.rawurlencode('Other'),
            'whatsapp' => $engineerDigits !== '' ? "https://wa.me/{$engineerDigits}?text={$message}" : $contact.'?urgency=urgent',
            'general_whatsapp' => $generalDigits !== '' ? "https://wa.me/{$generalDigits}?text={$message}" : $contact,
        ];
    }

    private static function digits(string $key): string
    {
        $digits = preg_replace('/\D/', '', (string) config($key, ''));

        return strlen($digits) >= 7 ? $digits : '';
    }
}
