<?php

namespace knet\Http\Middleware;

use Closure;
use App;
use knet\LogLocation;
use Torann\Registry\Facades\Registry;

class Localization
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
        $geoIp = geoip()->getLocation();
        // $geoIp = geoip()->getLocation('194.250.219.30');
        // $geoIp = geoip()->getLocation('213.152.198.50');
        // $geoIp = geoip()->getLocation('212.100.36.138');
        $locationLang = strtolower($geoIp->iso_code);
        // if ($request->session()->has('located')) {
        //    dd($request->session()->get('located'));
        // }
        // dd($request->getPreferredLanguage());
        // dd($geoIp);
        $logFind = LogLocation::where('ip_address', $geoIp->ip)
                      ->where('user_id', Registry::get('id'))
                      ->first();
        if (!$request->session()->has('located') || $logFind===null ) {
          $log = LogLocation::create([
            'ip_address' => $geoIp->ip,
            'user_id'    => Registry::get('id')
          ]);
          $request->session()->put('located', $log->id);
          $request->session()->save();
        }
        $lang = Registry::get('lang')!==null && Registry::get('lang')!='' ? Registry::get('lang') : $locationLang;
        App::setLocale($lang);
        return $next($request);
    }
}
