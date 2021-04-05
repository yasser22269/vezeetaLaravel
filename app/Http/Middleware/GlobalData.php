<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\View;

class GlobalData
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
        // start categories And childrens
        $setting = Setting::first();
        // End categories And childrens




        View::share([
               'setting'=> $setting,

               ]);
          return $next($request);
    }
}
