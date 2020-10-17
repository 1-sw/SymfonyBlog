<?php

// Current version of file of project works nice
// Now you can:
// [1] Send Post/Get requests
// [2] Work with maded DB 
// Future version will:
// [1] With ParamConverter
// [2] With Strict type syntax
// [3] With php7.4 typehint

declare(strict_types=1);

namespace App\Controller;

use Plugins;
use Plugins\CustomParConv;
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
	private $paramConverter;
	public function __construct(PostRepository $postRepository, PostManager $postManager, SerializerInterface $sI, ValidatorInterface $vI)
	{
		$this->postRepository = $postRepository;
		$this->paramConverter = new CustomParConv();
		$this->paramConverter->setRepository($this->postRepository);
		$this->paramConverter->setManager($postManager);
		$this->paramConverter->setSerializerI($sI);
		$this->paramConverter->setValidatorI($vI);
	}


	/**
	 * @Route("", methods={"POST"})
	 */
	public function create()
	{
		return $this->paramConverter->convert("post");
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
