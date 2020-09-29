<?php

namespace App\DataTransformer;

use App\Entity\Post;
use App\Model\Request\PostRequest;
use App\Model\Response\PostResponse;

class PostDataTransformer
{
	public function transform(PostRequest $postRequest): Post
    	{
        	return (new Post())
            		->setTitle($postRequest->getTitle())
            		->setContent($postRequest->getContent())
            		->setCreatedAt(new \DateTime())
            		->setUpdatedAt(new \DateTime());
    	}

    	public function reverseTransform(Post $post): PostResponse
    	{
        	return (new PostResponse())
            		->setId($post->getId())
            		->setContent($post->getContent())
            		->setTitle($post->getTitle())
            		->setCreatedAt($post->getCreatedAt()->format('Y-m-d H:i:s'))
            		->setUpdatedAt($post->getUpdatedAt()->format('Y-m-d H:i:s'));
    	}
}
