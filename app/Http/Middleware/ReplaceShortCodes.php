<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ShortCode;

class ReplaceShortCodes
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!method_exists($response, 'content')) {
            return $response;
        }

        $content = $response->content();

        // Fetch all shortcodes from the database
        $shortcodes = \App\Models\ShortCode::all();

        foreach ($shortcodes as $shortcode) {
            $content = str_replace('[[' . $shortcode->shortcode . ']]', $shortcode->replace, $content);
        }

        $response->setContent($content);

        return $response;
    }

}
