<?php

namespace Level7up\OpenRouter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OpenRouterClient
{
    protected Client $client;
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENROUTER_API_KEY');
        $this->baseUrl = 'https://openrouter.ai/api/v1';
    }

    public function getCompletion(string $prompt): ?string
    {
        try {
            $headers = [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ];

            $response = $this->client->post("{$this->baseUrl}/chat/completions", [
                'headers' => $headers,
                'json' => [
                    'model' => 'mistralai/mistral-7b-instruct:free',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $prompt,
                        ],
                    ],
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['choices'][0]['message']['content'] ?? null;

        } catch (GuzzleException $e) {
            throw new \RuntimeException('OpenRouter request failed: ' . $e->getMessage(), 0, $e);
        }
    }
}
