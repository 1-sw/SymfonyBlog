<?php

namespace App\Model\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PostRequest
{
		/**
		 * @var string|null
		 * 
     	 */
    	protected $title;

    	/**
     	* @var string|null
     	*/
    	protected $content;

    	public function getTitle(): ?string
    	{
        	return $this->title;
    	}

    	public function setTitle(?string $title): self
    	{
        	$this->title = $title;
        	return $this;
    	}

    	public function getContent(): ?string
    	{
        	return $this->content;
    	}	
    	public function setContent(?string $content): self
    	{
        	$this->content = $content;
        	return $this;
    	}
}
