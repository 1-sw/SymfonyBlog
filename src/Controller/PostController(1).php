<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/posts")
 */
class PostController extends AbstractController
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

	/**
     * @Route("/new", name="post", methods={"GET", "POST"})
     */
    public function addPost(Request $request, EntityManagerInterface $entityManager)
	{
	    $post = new Post();
	    $post
            ->setTitle(str_repeat('Qwerty', 10))
            ->setContent(str_repeat('Qwerty', 100))
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime());

	    $entityManager->persist($post);
        $entityManager->flush();

        return new Response($post->getId());
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function posts(): Response
    {
        $posts = $this->postRepository->findAll();

        dd($posts);

        return new Response();
    }
}
