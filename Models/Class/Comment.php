<?php

namespace App\models;

class Comment
{
    private $id;
    private $title;
    private $status;
    private $content;
    private $createdAt;
    private $createdBy;
    private $articleId;

    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    const APPROVED = 'APPROVED';

   public function __construct($id, $title, $status, $content, $createdAt, $createdBy, $articleId)
   {
       $this->id = $id;
       $this->title = $title;
       $this->status = $status;
       $this->content = $content;
       $this->createdAt = $createdAt;
       $this->createdBy = $createdBy;
       $this->articleId = $articleId;
   }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Comment
     */
    public function setId(mixed $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle(): mixed
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Comment
     */
    public function setTitle(mixed $title): static
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus(): mixed
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Comment
     */
    public function setStatus(mixed $status): static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent(): mixed
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Comment
     */
    public function setContent(mixed $content): static
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt(): mixed
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return Comment
     */
    public function setCreatedAt(mixed $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy(): mixed
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $createdBy
     * @return Comment
     */
    public function setCreatedBy(mixed $createdBy): static
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticleId(): mixed
    {
        return $this->articleId;
    }

    /**
     * @param mixed $articleId
     * @return Comment
     */
    public function setArticleId(mixed $articleId): static
    {
        $this->articleId = $articleId;
        return $this;
    }



}