<?php
namespace App\Helpers;
class OrangeMoney{
    private $authorization_header = "";
    private $marchant_key = "";
    private $amount = "";
    private $order_id = "";

    public function __construct($amount , $order_id)
    {
        $this->amount = $amount;
        $this->order_id = $order_id;
    }

    // Recupere le token generer par orange
    public function getAccessToken(){
        // $ch = curl_init(url: 'https://api.orange.com/oauth/v2/token');
        $ch = curl_init('https://api.orange.com/oauth/v2/token');
        curl_setopt($ch , CURLOPT_CUSTOMREQUEST , "POST");
        curl_setopt($ch , CURLOPT_HTTPHEADER , array(
                'Authorization: '. $this->authorization_header, 
            )
        );
        curl_setopt($ch , CURLOPT_POSTFIELDS , "grant_type = clients_credentials");
        curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);
        return json_decode(curl_exec($ch))->access_tokeen;
    }

    // La redirection vers la page du user
    public function getPaymentUrl($returnUrl){
        $data = [
            "merchant_key"=> $this->marchant_key,
            "currency"=> "XAF",
            "order_id"=> $this->order_id, // "".time()."", // ce order_id depand de la l'algorithme de l'application
            "amount" => $this->amount,
            "return_url"=> $returnUrl,
            "cancel_url"=> url("/home"),
            "notif_url"=> url('notification'),
            "lang"=> "fr",
            "reference"=> "Your Website"
        ];
        $ch = curl_init('https://api.orange.com/orange-money-webpay/cm/v1/webpayment');
        curl_setopt($ch , CURLOPT_CUSTOMREQUEST , "POST");
        curl_setopt($ch , CURLOPT_HTTPHEADER , array(
                'Authorization: Bearer '. $this->getAccessToken(),
                'Accept: application/json',
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch , CURLOPT_POSTFIELDS , json_encode($data));
        curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);
        return json_decode(curl_exec($ch))->access_tokeen;
    }
}