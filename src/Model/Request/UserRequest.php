<?php

namespace App\Model\Request;

class UserRequest
{
	/**
     	* @var string|null
     	*/
    	protected $name;

    	/**
     	* @var string|null
     	*/
    	protected $id;

    	public function getName(): ?string
    	{
        	return $this->name;
    	}

    	public function setName(?string $name): self
    	{
        	$this->name = $name;
        	return $this;
    	}

    	public function getId(): ?string
    	{
        	return $this->id;
    	}	

}
