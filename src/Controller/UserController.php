<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/users")
 */
class UserController extends AbstractController
{

	public function __construct(UserRepository $userRepository, UserManager $userManager, SerializerInterface $sI, ValidatorInterface $vI)
	{
	}


	/**
	 * @Route("", methods={"POST"})
	 */
	public function create()
	{
		return new Response();
	}

	/**
	 * @Route("", methods={"GET"})
	 */
	public function users(): Response
	{
		return new Response();
	}
}
