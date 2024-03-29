<?php

namespace App\Models\Class;

use DateTime;

class Comment
{
    private ?int $id;
    private string $title;
    private string $status;
    private string $content;
    private mixed $createdAt;
    private ?string $createdBy;
    private int $articleId;


    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    const APPROVED = 'APPROVED';

    public function __construct(?int $id,
                                string $title,
                                string $status,
                                string $content,
                                mixed $createdAt,
                                ?string $createdBy,
                                int $articleId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->status = $status;
        $this->content = $content;
        $this->createdAt = new DateTime($createdAt);
        $this->createdBy = $createdBy;
        $this->articleId = $articleId;

    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        if (is_string($id) && intval($id) > 0) {
            $this->id = intval($id);
        }
        if (is_int($id) && $id > 0) {
            $this->id = $id;
        }
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        if (mb_strlen($title) <= 255) {
            $this->title = $title;
        } else {
            $this->title = substr($title, 0, 255);
        }
    }
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): void
    {
        $this->content = strip_tags($content, ['p', 'a', 'i']);
    }
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function setCreatedAt(DateTime $createdAt): void
    {
        $format = 'Y-m-d H:i:s';

        $d = DateTime::createFromFormat($format, $createdAt);
        if ($createdAt == $d->format($format)) {
            $this->createdAt = $d->format($format);
        } else {
            $dd = new DateTime();
            $this->createdAt = $dd->format($format);
        }
    }
    public function getCreatedBy():?string
    {
        return $this->createdBy;
    }
    public function setCreatedBy(?string $user): void
    {
        $this->createdBy = $user;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus(string $status):void
    {
        $status = $status ?? $this::PENDING;
        $this->status = $status;
    }
    public function getArticleId():int
    {
        return $this->articleId;
    }
    public function setArticleId(string $articleId): static
    {
        $this->articleId = $articleId;
        return $this;
    }
}