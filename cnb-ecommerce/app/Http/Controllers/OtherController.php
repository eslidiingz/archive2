<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OtherController extends Controller
{
    public function indexAbout()
    {
        return view('pages.other.about');
    }
    public function indexAffiliateProgram()
    {
        return view('pages.other.affiliate-program');
    }
    public function indexPolicy()
    {
        return view('pages.other.policy');
    }
    public function indexTermsConditions()
    {
        return view('pages.other.terms-conditions');
    }
    public function indexSafety()
    {
        return view('pages.other.safety');
    }
    public function indexContact()
    {
        return view('pages.other.contact');
    }
    public function indexHelper()
    {
        return view('pages.other.helper');
    }
    public function indexOrder()
    {
        return view('pages.other.order');
    }
    public function indexShipping()
    {
        return view('pages.other.shipping');
    }
    public function indexReturnRefund()
    {
        return view('pages.other.return-refund');
    }
    public function indexForeignPolicy()
    {
        return view('pages.other.foreign-policy');
    }
}
