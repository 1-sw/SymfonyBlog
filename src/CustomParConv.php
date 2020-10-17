<?php

namespace Plugins;

use App\Model\Request\PostRequest;
use App\Model\Request\UserRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;



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
    public function convert(string $type): JsonResponse
    {


        if ($type === "user") {
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
        } else if ($type === "post") {
            $request = new Request();

            $json = $request->getContent();
            $body = json_decode($json, true);

            $postRequest = (new PostRequest())->setContent($body['content'])->setTitle($body['title']);

            $postRequest = $this->iUserSerializer->deserialize($json, PostRequest::class, 'json');

            $this->iUserValidator->validate($postRequest);

            $postResponse = $this->userManager->create($postRequest);

            return new JsonResponse($postResponse, Response::HTTP_CREATED);
        }
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
