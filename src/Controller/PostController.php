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

use App\Manager\PostManager;
use App\Model\Request\PostRequest;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
	 * @Route("", methods={"POST"})
	 */
	public function create(Request $request, PostManager $postManager, SerializerInterface $serializer, ValidatorInterface $validator): JsonResponse
	{
		$json = $request->getContent();
		$body = json_decode($json, true);
		$postRequest = (new PostRequest())->setContent($body['content'])->setTitle($body['title']);
		$postRequest = $serializer->deserialize($json, PostRequest::class, 'json');
		$validator->validate($postRequest);
		$postResponse = $postManager->create($postRequest);
		return new JsonResponse($postResponse, Response::HTTP_CREATED);
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
