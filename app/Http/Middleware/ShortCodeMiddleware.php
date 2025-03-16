<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ShortCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShortCodeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof Response && $response->isSuccessful()) {
            $content = $response->getContent();
            $shortcodes = ShortCode::all();

            foreach ($shortcodes as $shortcode) {
                $content = str_replace("[[{$shortcode->shortcode}]]", $shortcode->replace, $content);
            }

            $response->setContent($content);
        }

        return $response;
    }
}

