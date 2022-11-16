<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    //
    public function subscribe(ApiClient $mailchimp,Request $request){
        $DEFAULT_LIST = '58882c6c71';
        $request->validate([
            'email'=>['email','min:5']
        ]);

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);
        try {
            $mailchimp->lists->addListMember($DEFAULT_LIST,
                [
                    "email_address"=> $request->get('email'),
                    "status"=>"subscribed"
                ]);
        }catch (\Exception $e){
            ValidationException::withMessages([
                'email'=>'Oops! something went wrong, please check your spam! You may be subscribed already.'
            ]);
        }
    return redirect('/')->with('success','Congratulations! You are now subscribed to the newsletter');
    }

}
