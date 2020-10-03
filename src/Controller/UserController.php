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
     	 * @Route("", methods={"POST"})
     	 */
    	public function create(Request $request,UserManager $userManager,SerializerInterface $serializer, ValidatorInterface $validator): JsonResponse 
	{
		$json = $request->getContent();
	    	$body = json_decode($json, true);
	    	$userRequest = (new UserRequest())->setName($body['content']);
	    	//$postRequest = $serializer->deserialize($json, PostRequest::class, 'json');
	    	$validator->validate($userRequest);
            	$userResponse = $userManager->create($userRequest);
	    	return new JsonResponse($userResponse, Response::HTTP_CREATED);
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
