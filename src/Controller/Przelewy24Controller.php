<?php
declare(strict_types=1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Przelewy24\Przelewy24;
use Symfony\Component\HttpFoundation\Response;

class Przelewy24Controller extends AbstractController
{
       #[Route('/przelewy24', name: 'app_przelewy24', methods: 'GET')]

       public function index(): Response
       {
   //  $przelewy24 = new Przelewy24([
   //     'merchant_id' => '221283',
   //     'pos_id' => '221283',
   //     'crc' => 'eb4cf4c0bcea85f5',
   //     'sandbox' => true, // `true` for production/live mode
   //  ]);
   //  $transaction = $przelewy24->transaction([
   //     'session_id' => '917e5e2d',
   //     'url_return' => 'http://localhost:8000/cart',
   //     'url_status' => 'http://localhost:8000',
   //     'amount' => '1599',
   //     'description' => 'transaction description',
   //     'email' => 'cetex.tc@gmail.com',
   //   ]);
//     $token = $transaction->token();
//     $transaction->redirectUrl();
//     $webhook = $przelewy24->handleWebhook();
//     $przelewy24->verify([
//      'session_id' => '917e5e2d',
//      'order_id' => $webhook->orderId(),   // przelewy24 order id
//      'amount' => '1599',
//   ]);

    //  $p24 = [
    //      "merchantId" => 221283,
    //      "posId" => 221283,
    //      "sessionId" => "917e5e2d",
    //      "amount" => 1599,
    //      "currency" => "PLN",
    //      "description" => "string",
    //      "email" => "cetex.tc@gmail.com",
    //      "client" => "Tomek Romek",
    //      "address" => "string",
    //      "zip" => "string",
    //      "city" => "string",
    //      "country" => "PL",
    //      "phone" => "string",
    //      "language" => "pl",
    //      "method" => 0,
    //      "urlReturn" => "https://onet.pl",
    //      "urlStatus" => "string",
    //      "timeLimit" => 0,
    //      "channel" => 1,
    //      "waitForResult" => true,
    //      "regulationAccept" => false,
    //      "shipping" => 0,
    //      "transferLabel" => "string",
    //      "mobileLib" => 1,
    //      "sdkVersion" => "string",
    //      "sign" => "9c16dab7ae2955a4b0970b5eee7dd156ffc256f97646bd5712c189a57cdbe21d6c95174ca8cf75157c987cbea0d9d259",
    //      "encoding" => "string",
    //      "methodRefId" => "string",
    //      "cart" => [
    //            [
    //               "sellerId" => "string",
    //               "sellerCategory" => "string",
    //               "name" => "string",
    //               "description" => "string",
    //               "quantity" => 0,
    //               "price" => 0,
    //               "number" => "string"
    //            ]
    //         ],
    //      "additional" => [
    //                  "shipping" => [
    //                     "type" => 0,
    //                     "address" => "string",
    //                     "zip" => "string",
    //                     "city" => "string",
    //                     "country" => "string"
    //                  ]
    //               ]
    //   ];
    //  public function register()
    //  {
    //  }

    return $this->render('przelewy24/index.html.twig', [
       'controller_name' => 'Przelewy24Controller',
  ]);
}
}