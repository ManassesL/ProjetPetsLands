<?php


namespace App\Classe;


use Mailjet\Client;
use Mailjet\Resources;

class Mail
{

    private $api_key = 'f0434024d3621f93f67903f1b24b051d';
    private $api_key_secret = '098a159f05ba3293a02fe1834490575c';


    public function send($to_email, $to_name, $subject, $content) 
    {   
        $mj = new Client($this->api_key, $this->api_key_secret, true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "lebbatmanassees@gmail.com",
                        'Name' => "PetsLands"
            ],
                    'To' => [
                [
                    'Email' => $to_email,
                    'Name' => $to_name
                ]
            ],
            'TemplateID' => 5114938,
            'TemplateLanguage' => true,
            'Subject' => $subject,
            'Variables' => [
                'content' => $content,
            ]
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success();




    }
}