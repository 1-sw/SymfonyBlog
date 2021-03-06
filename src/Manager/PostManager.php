<?php

namespace App\Manager;
use App\Model\Request\PostRequest;
use App\Model\Response\PostResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\DataTransformer\PostDataTransformer;

class PostManager
{
	/** @var EntityManagerInterface */
    	private $em;

    	/** @var PostDataTransformer */
    	private $dataTransformer;

    	public function __construct(EntityManagerInterface $em, PostDataTransformer $dataTransformer)
    	{
        	$this->em = $em;
        	$this->dataTransformer = $dataTransformer;
    	}

    	public function create(PostRequest $request): PostResponse
    	{
        	$post = $this->dataTransformer->transform($request);
        	$this->em->persist($post);
        	$this->em->flush();
        	return $this->dataTransformer->reverseTransform($post);
    	}
}
