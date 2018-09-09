<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class PostsController extends Controller
{
    /**
     * @Route("/posts", name="posts")
     */
    public function index(PostRepository $posts)
    {
        return $this->render('posts/index.html.twig', [
            'posts' => $posts->findAll(),
        ]);
    }

    /**
     * @Route("/posts/new", name="new_posts")
     */
    public function newPost(Request $request, Session $session, ObjectManager $entityManager, UserInterface $user = null)
    {
        if (!$user) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $post = $this->emptyPost($user);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Post $post */
            $post = $form->getData();
            $this->storePost($post, $entityManager);
            $session->getFlashBag()->add('success', "Post will be saved: " . $post->getTitle());
        }

        return $this->render('posts/new.html.twig', ['form' => $form->createView()]);
    }

    private function storePost(Post $post, ObjectManager $entityManager)
    {
        $entityManager->persist($post);
        $entityManager->flush();
    }

    private function emptyPost(UserInterface $user)
    {
        return new Post('', new \DateTime(), '', $user);
    }
}
