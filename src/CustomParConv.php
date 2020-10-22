<?php

namespace Plugins;

use App\Model\Request\PostRequest;
use App\Model\Request\UserRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

/**
 * @Route("/users")
 */
class CustomParConv implements ParamConverterInterface
{
    private $repository;
    private $manager;
    private $iSerializer;
    private $iValidator;
    private $json;
    private $request;
    private $conf;

    public function supports(ParamConverter $configuration)
    {
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
    }


    /**
     * @Route("", methods={"POST"}) 
     */
    public function convert(string $type): JsonResponse
    {
        $this->request = new Request();
        $this->json = $this->request->getContent();

        if ($type === "user") {

            $userRequest = $this->iSerializer->deserialize($this->json, UserRequest::class, 'json');
            $this->iValidator->validate($userRequest);
            $userResponse = $this->manager->create($userRequest);
            return new JsonResponse($userResponse, Response::HTTP_CREATED);
        } else if ($type === "post") {

            $postRequest = $this->iSerializer->deserialize($this->json, PostRequest::class, 'json');
            $this->iValidator->validate($postRequest);
            $postResponse = $this->manager->create($postRequest);
            return new JsonResponse($postResponse, Response::HTTP_CREATED);
        }
    }

    public function setRepository($data)
    {
        return $this->repository = $data;
    }

    public function setManager($data)
    {
        return $this->manager = $data;
    }

    public function setSerializerI($data)
    {
        return $this->iSerializer = $data;
    }

    public function setValidatorI($data)
    {
        return $this->iValidator = $data;
    }

    public function showResultDB(): Response
    {
        $result = $this->repository->findAll();
        dd($result);
        return new Response();
    }
}
