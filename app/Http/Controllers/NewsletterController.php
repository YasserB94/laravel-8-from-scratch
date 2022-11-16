<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    //
    public function __construct(private Newsletter $newsletter){

    }
    public function subscribe(Request $request){
        $request->validate([
            'email'=>['email','min:5']
        ]);
        try {
            $this->newsletter->subscribe($request->get('email'));
        }catch (\Exception $e){
            ValidationException::withMessages([
                'email'=>'Oops! something went wrong. We are sorry'
            ]);
        }
    return redirect('/')->with('success','Congratulations! You are now subscribed to the newsletter');
    }

}
