<?php

namespace App\Model\Response;

use DateTimeInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UserResponse implements \JsonSerializable
{
	/**
     	* @var int
     	*/
    	protected $id;

    	/**
     	* @var string
     	*/
    	protected $name;

    	/**
     	* @var string
     	*/
    	protected $createdAt;

    	/**
     	* @var email
     	*/
    	protected $email;

    	/**
     	* @var password
     	*/
    	protected $password;

    	/**
     	* @var string
     	*/
    	protected $updatedAt;

    	public function getId(): int
   	{
        	return $this->id;
    	}

    	public function setId(int $id): self
    	{
        	$this->id = $id;
        	return $this;
    	}



    	public function getName(): ?string
    	{
        	return $this->name;
    	}

    	public function setName(?string $name): self
    	{
        	$this->name = $name;
        	return $this;
    	}

    	public function getCreatedAt(): string
    	{
        	return $this->createdAt;
   	}

    	public function setCreatedAt(string $createdAt): self
    	{
        	$this->createdAt = $createdAt;
        	return $this;
    	}

    	public function getUpdatedAt(): string
    	{
        	return $this->updatedAt;
    	}

    	public function setUpdatedAt(string $updatedAt): self
    	{
        	$this->updatedAt = $updatedAt;
        	return $this;
    	}

    	public function jsonSerialize(): array
    	{
        	return get_object_vars($this);
    	}



    	public function getPassword()
   	{
        	return $this->password;
    	}

    	public function setPassword(string $password): self
    	{
        	$this->password = $password;
        	return $this;
    	}

    	public function getEmail()
   	{
        	return $this->email;
    	}

    	public function setEmail(string $email): self
    	{
        	$this->email = $email;
        	return $this;
    	}


}
