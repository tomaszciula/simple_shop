<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DotPayController extends AbstractController
{
    #[Route('/dotpay', name: 'app_dot_pay')]
    public function index(): Response
    {
        return $this->render('dot_pay/index.html.twig', [
            'controller_name' => 'DotPayController',
        ]);
    }
}
