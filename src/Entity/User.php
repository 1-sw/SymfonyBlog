<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;


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
     	* @ORM\Column(type="string", length=255, nullable=true)
     	*/
   	 private $name;

    	/**
     	* @ORM\Column(type="string", length=255, nullable=true)
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


    	public function getCreatedAt(): ?\DateTimeInterface
    	{
        	return $this->createdAt;
    	}

    	public function setCreatedAt(\DateTimeInterface $createdAt): self
    	{
        	$this->createdAt = $createdAt;
        	return $this;
    	}

    	public function getUpdatedAt(): ?\DateTimeInterface
    	{
        	return $this->updatedAt;
    	}

    	public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    	{
        	$this->updatedAt = $updatedAt;
        	return $this;
    	}

	public function getSalt()
	{
	/* I use bcrypt, so this method steel blanked */
	}

	public function getUsername(){}

	public function eraseCredentials(){}

	public function getRoles(){}


}
