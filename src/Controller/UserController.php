<?php



namespace App\Controller;
use App\Manager\UserManager;
use App\Model\Request\UserRequest;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration;

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
	    	$userRequest = (new UserRequest())
			->setName($body['name'])
			->setPassword($body['password'])
			->setEmail($body['email']);
	    	//$postRequest = $serializer->deserialize($json, UserRequest::class, 'json');
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
