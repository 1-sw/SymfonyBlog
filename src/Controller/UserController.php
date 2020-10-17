<?php

namespace App\Controller;

use Plugins\CustomParConv;
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
	private $paramConverter;

	public function __construct(UserRepository $userRepository, UserManager $userManager, SerializerInterface $sI, ValidatorInterface $vI)
	{
		$this->paramConverter = new CustomParConv();
		$this->paramConverter->setRepository($userRepository);
		$this->paramConverter->setManager($userManager);
		$this->paramConverter->setSerializerI($sI);
		$this->paramConverter->setValidatorI($vI);
	}


	/**
	 * @Route("", methods={"POST"})
	 */
	public function create()
	{
		return $this->paramConverter->convert("user");
	}

	/**
	 * @Route("", methods={"GET"})
	 */
	public function users(): Response
	{
		$this->paramConverter->showUsers();
		return new Response();
	}
}
