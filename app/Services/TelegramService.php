<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class TelegramService
{
    public function enabled(): bool
    {
        return filled(config('services.telegram.bot_token')) && filled(config('services.telegram.chat_id'));
    }

    /**
     * Send an HTML-formatted message (and optional file) to the configured chat.
     * Returns false when disabled; throws on API failure.
     */
    public function send(string $html, ?UploadedFile $attachment = null): bool
    {
        if (! $this->enabled()) {
            return false;
        }

        $base = 'https://api.telegram.org/bot' . config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        Http::timeout(10)->post($base . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => mb_substr($html, 0, 4096),
            'parse_mode' => 'HTML',
            'disable_web_page_preview' => true,
        ])->throw();

        if ($attachment && $attachment->isValid()) {
            Http::timeout(30)
                ->attach('document', fopen($attachment->getRealPath(), 'r'), $attachment->getClientOriginalName())
                ->post($base . '/sendDocument', ['chat_id' => $chatId])
                ->throw();
        }

        return true;
    }
}
