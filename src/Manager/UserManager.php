<?php

/////////////////////////////
// ATTENTION COPYPASTE HERE//
/////////////////////////////

namespace App\Manager;
use App\Model\Request\UserRequest;
use App\Model\Response\UserResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\DataTransformer\UserDataTransformer;

class UserManager
{
	/** @var EntityManagerInterface */
    	private $em;

    	/** @var UserDataTransformer */
    	private $dataTransformer;

    	public function __construct(EntityManagerInterface $em, UserDataTransformer $dataTransformer)
    	{
        	$this->em = $em;
        	$this->dataTransformer = $dataTransformer;
    	}

    	public function create(UserRequest $request): UserResponse
    	{
        	$post = $this->dataTransformer->transform($request);
        	$this->em->persist($post);
        	$this->em->flush();
        	return $this->dataTransformer->reverseTransform($post);
    	}
}
