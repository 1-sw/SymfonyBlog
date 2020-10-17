<?php

namespace Plugins;



use App\Manager\UserManager;
use App\Model\Request\UserRequest;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

use Symfony\Component\Validator\Validator\ValidatorInterface;



/**
 * @Route("/users")
 */
class CustomParConv
{
    private $userRepository;
    private $userManager;
    private $iUserSerializer;
    private $iUserValidator;


    /**
     * @Route("", methods={"POST"})
     * 
     */
    public function convert(): JsonResponse
    {

        $request = new Request();

        $json = $request->getContent();
        $body = json_decode($json, true);
        $userRequest = (new UserRequest())
            ->setName($body['name'])
            ->setPassword($body['password'])
            ->setEmail($body['email']);


        $userRequest = $this->iUserSerializer->deserialize($json, UserRequest::class, 'json');
        $this->iUserValidator->validate($userRequest);

        $userResponse = $this->userManager->create($userRequest);

        return new JsonResponse($userResponse, Response::HTTP_CREATED);
    }

    public function setRepository($data)
    {
        return $this->userRepository = $data;
    }

    public function setManager($data)
    {
        return $this->userManager = $data;
    }


    public function setSerializerI($data)
    {
        return $this->iUserSerializer = $data;
    }

    public function setValidatorI($data)
    {
        return $this->iUserValidator = $data;
    }



    public function showUsers(): Response
    {
        $users = $this->userRepository->findAll();

        dd($users);
        return new Response();
    }
}
