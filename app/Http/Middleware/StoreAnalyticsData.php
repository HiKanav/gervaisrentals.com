<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Closure;

class StoreAnalyticsData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $queryParameters = $request->query();

        $referer = $request->headers->get('referer');

        $source = (bool)$referer & !str_contains($referer, $request->getHost()) 
                    ? [ 'source_referrer' => $referer, 'entry_url' => $request->fullUrl() ] 
                    : [];

        $seo_metrics = array_merge($queryParameters, $source);

        if($source) {
            session()->put( 'metrics', $seo_metrics );
        }

        return $next($request);
    }
}