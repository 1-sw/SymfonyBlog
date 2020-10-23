<?php

declare(strict_types=1);

namespace App\Controller;

use App\Manager\PostManager;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/posts")
 */
class PostController extends AbstractController
{
	private $postRepository;
	private $postManager;
	private $serializerI;
	private $validatorI;


	public function __construct(PostRepository $postRepository, PostManager $postManager, SerializerInterface $sI, ValidatorInterface $vI)
	{
		$this->postRepository = $postRepository;
		$this->postManager = $postManager;
		$this->serializerI = $sI;
		$this->validatorI = $vI;
	}


	/**
	 * @Route("", methods={"POST"})
	 * @ParamConverter()
	 */
	public function create()
	{
		return new Response();
	}

	/**
	 * @Route("", methods={"GET"})
	 */
	public function posts(): Response
	{
		return new Response();
	}
}
