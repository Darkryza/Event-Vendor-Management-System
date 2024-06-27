<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// add this to the top of the file
use Illuminate\Support\Facades\URL;


// add this statement to public function boot()
if($this->app->environment('production')) {
    URL::forceScheme('https');
};


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
