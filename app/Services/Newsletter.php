<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(String $email){

        $list_id = '1d054fbcc1';

        return  $this->client()->lists->addListMember($list_id, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    public function client(){


        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);

    }
}
