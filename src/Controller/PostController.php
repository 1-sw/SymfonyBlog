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
use Symfony\Component\Validator\Constraints\Regex;

/**
 * @Route("/posts")
 */
class PostController extends AbstractController
{
	private $postRepository;

	public function __construct(PostRepository $postRepository, PostManager $postManager, SerializerInterface $sI, ValidatorInterface $vI)
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
	public function posts(): Response
	{
		$this->paramConverter->showResultDB();
		return new Response();
	}
}
