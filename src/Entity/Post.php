<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 * @ORM\Table(name="posts")
 */
class Post
{
	/**
     	* @ORM\Id
     	* @ORM\GeneratedValue
     	* @ORM\Column(type="integer")
	* @Assert\NotBlank
	* @Assert\NotNull
	* @Assert\Positive
     	*/
    	private $id;

    	/**
     	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank
	 * @Assert\NotNull
	 * @Assert\Length(min=3,max=30)
     	 */
    	private $title;

   	/**
      	 * @ORM\Column(type="text")
	 * @Assert\NotBlank
	 * @Assert\NotNull
	 * @Assert\Length(min=50,max=3000)
    	 */
    	private $content;

     	/**
      	 * @ORM\Column(type="datetime")
	 * @Assert\NotBlank
	 * @Assert\NotNull
	 * @Assert\DateTime
   	 */
    	private $createdAt;

    	/**
     	 * @ORM\Column(type="datetime")
	 * @Assert\NotBlank
	 * @Assert\NotNull
	 * @Assert\DateTime
     	 */
    	private $updatedAt;

    	public function getId()
    	{
        	return $this->id;
    	}

    	public function getTitle()
    	{
        	return $this->title;
    	}

    	public function setTitle(string $title): self
    	{
        	$this->title = $title;
        	return $this;
   	}

   	public function getContent()
    	{
     		return $this->content;
    	}

    	public function setContent(string $content): self
    	{
        	$this->content = $content;
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
}
