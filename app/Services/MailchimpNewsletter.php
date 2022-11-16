<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function __construct(private ApiClient $mailClient)
    {
    }
    public function subscribe(string $email, string $list = null)
    {
        $list??=config('services.mailchimp.lists.subscribers');

        return $this->mailClient->lists->addListMember($list,
            [
                "email_address"=> $email,
                "status"=>"subscribed"
            ]);
    }
}
