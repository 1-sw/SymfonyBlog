<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\PostType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/users")
 */
class UserController extends AbstractController
{
	private $userRepository;
    	public function __construct(UserRepository $userRepository)
    	{
        	$this->userRepository = $userRepository;
    	}

	/**
     	* @Route("/new", name="post", methods={"GET", "POST"})
     	*/
    	public function addPost(Request $request, EntityManagerInterface $entityManager)
    	{
		$user = new User();
	    	$user
            		->setName(str_repeat('Qwerty',1))
            		->setPassword(str_repeat('Q123werty',2))
            		->setEmail(str_repeat('Q@example',1));

	    	$entityManager->persist($user);
        	$entityManager->flush();
        	return new Response($user->getId());
    	}

    	/**
     	* @Route("", methods={"GET"})
     	*/
    	public function users(): Response
    	{
        	$users = $this->userRepository->findAll();

        	dd($users);
        	return new Response();
    	}
}
