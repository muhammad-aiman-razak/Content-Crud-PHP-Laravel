<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::where('deleted', false)->get();
        return view('newsletters.index', compact('newsletters'));
    }
}
