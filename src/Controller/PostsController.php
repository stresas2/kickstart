<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;

class PostsController extends Controller
{
    /**
     * @Route("/posts", name="posts")
     */
    public function index()
    {
        return $this->render('posts/index.html.twig', [
            'controller_name' => 'PostsController',
        ]);
    }

    /**
     * @Route("/posts/new", name="new_posts")
     */
    public function newPost(UserInterface $user = null)
    {
        if (!$user) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        return $this->render('posts/new.html.twig', ['user' => $user]);
    }
}
