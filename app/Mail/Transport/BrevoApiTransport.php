<?php

namespace App\Mail\Transport;

use Illuminate\Support\Facades\Http;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\MessageConverter;

class BrevoApiTransport extends AbstractTransport
{
    private const ENDPOINT = 'https://api.brevo.com/v3/smtp/email';

    public function __construct(
        private readonly string $apiKey,
        private readonly bool $verifySsl = true,
    ) {
        parent::__construct();
    }

    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());

        $response = Http::withHeaders(['api-key' => $this->apiKey, 'accept' => 'application/json'])
            ->withOptions(['verify' => $this->verifySsl])
            ->timeout(30)
            ->post(self::ENDPOINT, $this->payload($email));

        if ($response->failed()) {
            throw new TransportException(
                'Brevo API error ('.$response->status().'): '.$response->body()
            );
        }

        if ($id = $response->json('messageId')) {
            $message->setMessageId($id);
        }
    }

    private function payload(Email $email): array
    {
        $payload = [
            'sender' => $this->address($email->getFrom()[0]),
            'to' => array_map($this->address(...), $email->getTo()),
            'subject' => $email->getSubject(),
        ];

        if ($html = $email->getHtmlBody()) {
            $payload['htmlContent'] = $html;
        }
        if ($text = $email->getTextBody()) {
            $payload['textContent'] = $text;
        }
        if ($cc = $email->getCc()) {
            $payload['cc'] = array_map($this->address(...), $cc);
        }
        if ($bcc = $email->getBcc()) {
            $payload['bcc'] = array_map($this->address(...), $bcc);
        }
        if ($replyTo = $email->getReplyTo()) {
            $payload['replyTo'] = $this->address($replyTo[0]);
        }

        foreach ($email->getAttachments() as $attachment) {
            $payload['attachment'][] = [
                'name' => $attachment->getPreparedHeaders()->getHeaderParameter('Content-Disposition', 'filename') ?: 'attachment',
                'content' => base64_encode($attachment->getBody()),
            ];
        }

        return $payload;
    }

    private function address(Address $address): array
    {
        return array_filter(['email' => $address->getAddress(), 'name' => $address->getName()]);
    }

    public function __toString(): string
    {
        return 'brevo+api';
    }
}
