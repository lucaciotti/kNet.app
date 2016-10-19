<?php

namespace knet\Http\Middleware;

use Torann\Registry\Facades\Registry;
use Auth;
use Closure;

class SetConnectionDB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){
          switch (Auth::user()->ditta) {
            case 'it':
              $settings = [
                'ditta_DB' => env('DB_CNCT_IT', 'kNet_it')
              ];
              break;
            case 'fr':
              $settings = [
                'ditta_DB' => env('DB_CNCT_FR', 'kNet_fr')
              ];
              break;
            case 'es':
              $settings = [
                'ditta_DB' => env('DB_CNCT_ES', 'kNet_es')
              ];
              break;

            default:
              abort(401, 'There\'s no Ditta!');
              break;
          }
          Registry::store($settings);
        }
        return $next($request);
    }
}
