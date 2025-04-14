<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplaceShortCodes
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (
            $response instanceof Response &&
            str_contains($response->headers->get('Content-Type'), 'text/html')
        ) {
            $content = $response->getContent();

            $replacements = [
                '[[app_name]]' => 'Car Insurance',
                '[[home_title]]' => 'Welcome to the home page',
                '[[welcome_message]]' => 'Hello, hope you find everything you need!',
                '[[footer_text]]' => '© 2025 Car Insurance',
            ];

            $content = str_replace(array_keys($replacements), array_values($replacements), $content);
            $response->setContent($content);
        }

        return $response;
    }
}
