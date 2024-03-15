<?php

namespace App\Http\Controllers\Frontend\Invokable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('frontend.pages.about-us');
    }
}
