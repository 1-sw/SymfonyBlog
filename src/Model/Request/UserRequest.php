<?php

namespace App\Model\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

    	/**
     	* @var string|null
     	*/
    	protected $password;


    	/**
     	* @var string|null
     	*/
    	protected $email;


    	public function getName(): ?string
    	{
        	return $this->name;
    	}

    	public function setPassword(?string $password): self
    	{
        	$this->password = $password;
        	return $this;
    	}

    	public function getPassword(): ?string
    	{
        	return $this->password;
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

    	public function setEmail(?string $email): self
    	{
        	$this->email = $email;
        	return $this;
    	}



    	public function getEmail(): ?string
    	{
        	return $this->email;
    	}	
}
