<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/users")
 */
class UserController extends AbstractController
{
	private $userRepository;
	private $userManager;
	private $serializerI;
	private $validatorI;

	public function __construct(UserRepository $userRepository, UserManager $userManager, SerializerInterface $sI, ValidatorInterface $vI)
	{
		$this->userRepository = $userRepository;
		$this->userManager = $userManager;
		$this->serializerI = $sI;
		$this->validatorI = $vI;
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
