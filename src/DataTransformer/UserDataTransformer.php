<?php

namespace App\DataTransformer;

use App\Entity\User;
use App\Model\Request\UserRequest;
use App\Model\Response\UserResponse;

class UserDataTransformer
{
	public function transform(UserRequest $userRequest): User
    	{
        	return (new User())
            		->setName($userRequest->getName())
            		->setCreatedAt(new \DateTime())
            		->setUpdatedAt(new \DateTime());
    	}

    	public function reverseTransform(User $user): UserResponse
    	{
        	return (new UserResponse())
            		->setId($user->getId())
            		->setName($user->getName())
            		->setCreatedAt($user->getCreatedAt()->format('Y-m-d H:i:s'))
            		->setUpdatedAt($user->getUpdatedAt()->format('Y-m-d H:i:s'));
    	}
}
