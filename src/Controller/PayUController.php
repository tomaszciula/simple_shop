<?php
declare(strict_types=1);
namespace App\Controller;

// include 'vendor/autoload.php';

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PayUController extends AbstractController
{
        // public function __construct(
        //     private RequestStack $requestStack,
        // ){}
    #[Route('/payu', name: 'app_pay_u')]
    public function index(RequestStack $requestStack): RedirectResponse
    {
        $session = $requestStack->getSession();
        $price = $session->get('price');
        $url = 'https://secure.snd.payu.com/api/v2_1/orders';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = [
           'Content-Type: application/json',
           'Authorization: Bearer d9a4536e-62ba-4f60-8017-6053211d3f47',
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA
{
        "notifyUrl": "https://your.eshop.com/notify",
        "customerIp": "127.0.0.1",
        "merchantPosId": "300746",
        "description": "RTV market",
        "currencyCode": "PLN",
        "totalAmount": $price,
        "buyer": {
            "email": "cetex.tc@gmail.com",
            "phone": "654111654",
            "firstName": "Tomek",
            "lastName": "Romek",
            "language": "pl"
        },
        "products": [
            {
                "name": "Wireless Mouse for Laptop",
                "unitPrice": "15000",
                "quantity": "1"
            },
            {
                "name": "HDMI cable",
                "unitPrice": "6000",
                "quantity": "1"
            }
        ]
    }
DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        // for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        // var_dump($resp);
        $response = json_decode($resp, true);
        $url = $response['redirectUri'];

        return new RedirectResponse($url);
    }
}
