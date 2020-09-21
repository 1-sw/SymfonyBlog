<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Cocur\Slugify\Slugify;
use App\Form;

class PostController extends AbstractController {

	/**
     * @Route("/posts/new", name="post")
     */
    public function addPost(Request $request, Slugify $slugify) {
        $post = new Post(); #--- There is a problem
		
		$form = $this->createForm(PostType::class, $post);
		$form->handleRequest($request);
        
		$slugify = new Slugify();
		if ($form->isSubmitted() && $form->isValid()) 
		{	
			$post
				->setSlug($slugify->slugify($post->getTitle()))
				->setCreatedAt(new \DateTime());

			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();
            
			return $this->redirectToRoute('blog_posts');
        }
        return $this->render('posts\index.html.twig', ['form' => $form->createView()]);
    }
}
