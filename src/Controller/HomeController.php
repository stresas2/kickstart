<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/upload", name="upload")
     */
    public function upload(Request $request)
    {
        /** @var UploadedFile[] $files */
        $files = $request->files->all();
        return $this->render('home/index.html.twig', [
            'files' => $files
        ]);
    }
}
