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
        if (Auth::check() &&  $request->path()!="logout"){
          $user = Auth::user();
          switch ($user->ditta) {
            case 'it':
              $settings = [
                'ditta_DB' => env('DB_CNCT_IT', 'kNet_it'),
                'location' => 'it',
                'role' => $user->roles()->first()->name,
                'codag' => $user->codag,
                'codcli' => $user->codcli
              ];
              break;
            case 'fr':
              $settings = [
                'ditta_DB' => env('DB_CNCT_FR', 'kNet_fr'),
                'location' => 'fr',
                'role' => $user->roles()->first()->name,
                'codag' => $user->codag,
                'codcli' => $user->codcli
              ];
              break;
            case 'es':
              $settings = [
                'ditta_DB' => env('DB_CNCT_ES', 'kNet_es'),
                'location' => 'es',
                'role' => $user->roles()->first()->name,
                'codag' => $user->codag,
                'codcli' => $user->codcli
              ];
              break;

            default:
              Registry::flush();
              abort(412, 'There\'s no Ditta!');
              break;
          }
          Registry::store($settings);
        } else {
          Registry::flush();
        }
        return $next($request);
    }
}
