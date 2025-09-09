<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiteMarkController extends Controller
{
    public function __invoke(User $user) {
        return view('site-mark', compact('user'));
    }
}
