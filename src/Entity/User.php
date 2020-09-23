<?php

namespace App\Entity;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
	/**
     	* @ORM\Id
     	* @ORM\GeneratedValue
     	* @ORM\Column(type="integer")
     	*/
    	private $id;

   	/**
     	* @ORM\Column(type="string", length=255)
     	*/
   	 private $name;

    	/**
     	* @ORM\Column(type="string", length=255)
     	*/
    	private $password;

    	/**
     	* @ORM\Column(type="string", length=255, nullable=true)
     	*/
    	private $email;

 
    	public function getId(): ?int
    	{
        	return $this->id;
    	}

    	public function getName(): ?string
    	{
        	return $this->name;
    	}

    	public function setName(string $name): self
    	{
        	$this->name = $name;

       		return $this;
    	}

    	public function getPassword(): ?string
    	{
        	return $this->password;
    	}

    	public function setPassword(string $password): self
    	{
        	$this->password = $password;

        	return $this;
	}

    	public function getEmail(): ?string
    	{
        	return $this->email;
	}

    	public function setEmail(?string $email): self
    	{
	        $this->email = $email;

        	return $this;
   	}
	public function getSalt(){}
	public function getUsername(){}
	public function eraseCredentials(){}
	public function getRoles(){}
}