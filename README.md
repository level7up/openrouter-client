# OpenRouter Client for Laravel

A simple Laravel wrapper for the [OpenRouter API](https://openrouter.ai/) to easily perform chat completions using models like `openai/gpt-4o`.

---

## 🧰 Features

- Easy integration with Laravel via Service Provider
- Customizable via `.env` or `config/openrouter.php`
- Uses Guzzle for HTTP requests
- Supports `max_tokens` for response control

---

## 🚀 Installation

Require the package via Composer:

```bash
composer require level7up/openrouter-client
```

---

## 🛠 Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=config
```

Add your credentials to `.env`:

```env
OPENROUTER_API_KEY=your_openrouter_api_key
OPENROUTER_BASE_URL=https://openrouter.ai/api/v1
OPENROUTER_REFERER=https://your-site.com        # optional
OPENROUTER_SITE_TITLE=Your Site Name            # optional
```

---

## 🧪 Usage

Inject the client into your controller or service:

```php
use Level7up\OpenRouter\OpenRouterClient;

class ChatController extends Controller
{
    public function ask(OpenRouterClient $client)
    {
        $response = $client->getCompletion('Tell me a joke.', 50);
        return response()->json(['reply' => $response]);
    }
}
```

---

## ⚙️ Configuration File

After publishing, you can modify `config/openrouter.php`:

```php
return [
    'api_key'    => env('OPENROUTER_API_KEY'),
    'base_url'   => env('OPENROUTER_BASE_URL', 'https://openrouter.ai/api/v1'),
    'referer'    => env('OPENROUTER_REFERER'),
    'site_title' => env('OPENROUTER_SITE_TITLE'),
];
```

---

## 📚 API Reference

### `getCompletion(string $prompt, int $maxTokens = 100): ?string`

Sends a prompt to the OpenRouter API and returns the response string.

---

## ✅ Requirements

- PHP 8.0+
- Laravel 8+
- Guzzle 7+

---

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

## 🧠 About

Maintained by [Level7up](https://github.com/level7up). Contributions and issues are welcome!
