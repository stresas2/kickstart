<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
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

        $user = new Post('', new \DateTime(), '', $user);
        $form = $this->createForm(PostType::class, $user);

        return $this->render('posts/new.html.twig', ['form' => $form->createView()]);
    }
}
