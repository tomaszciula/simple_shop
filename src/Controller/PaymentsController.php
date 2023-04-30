<?php
declare(strict_types=1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentsController extends AbstractController
{
    // private RequestStack $requestStack;

    // public function __construct(
    //     RequestStack $requestStack,
    // ){
    //     $this->requestStack = $requestStack;
    // }
    #[Route('/payments', name: 'app_payments')]
    public function index(RequestStack $requestStack): Response
    {
        $session = $requestStack->getSession();
        var_dump($session->get('cart'));
        return $this->render('payments/index.html.twig', [
            'controller_name' => 'PaymentsController',

        ]);
    }
}
