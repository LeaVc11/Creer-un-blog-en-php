<?php

namespace App\Models\Class;

use DateTime;

class Article
{
    private ?int $id = null;
    private ?string $image_link;
    private string $chapo;
    private string $title;
    private string $content;
    private string $author;
    private string $slug;
    private DateTime $createdAt;
    private DateTime $updatedAt;


    public function __construct(?int     $id,
                                ?string   $image_link,
                                string   $chapo,
                                string   $title,
                                string   $content,
                                string   $author,
                                string   $slug,
                                DateTime $createdAt,
                                DateTime $updatedAt)
    {
        $this->id = $id;
        $this->image_link = $image_link;
        $this->chapo = $chapo;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->slug = $slug;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

    }

    public function getChapo(): string
    {
        return $this->chapo;
    }

    public function setChapo(string $chapo): Article
    {
        $this->chapo = $chapo;
        return $this;
    }
    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): Article
    {
        $this->slug = $slug;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getImageLink(): ?string
    {
        return $this->image_link;
    }
    public function setImageLink(?string $image_link): Article
    {
        $this->image_link = $image_link;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Article
    {
        $this->author = $author;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): Article
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): Article
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}

