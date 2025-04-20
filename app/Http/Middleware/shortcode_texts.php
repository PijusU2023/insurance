<?php
namespace App\Http\Middleware;

use Closure;

class shortcode_texts
{
/**
* Handle an incoming request.
*
* @param \Illuminate\Http\Request $request
* @param \Closure $next
* @return mixed
*/
public function handle($request, Closure $next)
{
$response = $next($request);

if (!method_exists($response, 'getContent')) {
return $response;
}

// Get original HTML content
$content = $response->getContent();

// Replace the shortcode
$content = str_replace('shortcode_hello', 'Hello There', $content);

// Set the updated content back
$response->setContent($content);

return $response;
}
}
