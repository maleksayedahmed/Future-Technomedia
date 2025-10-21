<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display the FAQ page.
     */
    public function index()
    {
        $faqs = Faq::getActiveFaqs();
        return view('user.faq', compact('faqs'));
    }
}
