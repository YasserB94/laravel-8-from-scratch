<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function __construct(private ApiClient $mailchimpApiClient)
    {
        $this->configApi();
    }
    public function subscribe(string $email, string $list = null)
    {
        $list??=config('services.mailchimp.lists.subscribers');

        return $this->mailchimpApiClient->lists->addListMember($list,
            [
                "email_address"=> $email,
                "status"=>"subscribed"
            ]);
    }
    protected function configApi(){
        $this->mailchimpApiClient->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.serverPrefix')]
        );
    }
}
