<?php

namespace App\Model\Response;

use DateTimeInterface;

class PostResponse implements \JsonSerializable
{
	/**
     	* @var int
     	*/
    	protected $id;

    	/**
     	* @var string
     	*/
    	protected $title;

    	/**
     	* @var string
     	*/
    	protected $content;

    	/**
     	* @var string
     	*/
    	protected $createdAt;

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
}
