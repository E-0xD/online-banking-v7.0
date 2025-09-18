<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function personalBanking()
    {
        $data = ['title' => 'Personal Banking'];

        return view('frontend.services.personal_banking', $data);
    }
    public function businessBanking()
    {
        $data = ['title' => 'Business Banking'];

        return view('frontend.services.business_banking', $data);
    }
    public function loanAndCredit()
    {
        $data = ['title' => 'Loan & Credit'];

        return view('frontend.services.loan_and_credit', $data);
    }
    public function grant()
    {
        $data = ['title' => 'Grants'];

        return view('frontend.services.grant', $data);
    }
}
