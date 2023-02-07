<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = "en";
        if (Session::has('lang')) {
            $locale = Session::get('lang');
        }

        $isValid = strlen($request->segment(1)) == 2 && strlen($request->segment(1)) == 2;
        if ($isValid) {
            $locale = $request->segment(1);
            Session::put('lang', $locale);
        }
        app()->setLocale($locale);
        URL::defaults(['locale' => $locale]);

        if (!$isValid) {
            $newUri = '/' . $locale . $request->getRequestUri();
            return redirect($newUri);
        }


        return $next($request);
    }
}
