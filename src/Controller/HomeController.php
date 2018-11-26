<?php

namespace App\Controller;

use App\Services\MyService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(MyService $myService)
    {
        return $this->render('home/index.html.twig', [
            'sum' => $myService->sum(1, 2),
        ]);
    }
}
