<?php

namespace App\Models\Class;

use DateTime;

class Comment
{
    private ?int $id;
    private string $title;
    private string $status;
    private string $content;
    private DateTime $createdAt;
    private $createdBy;
    private $articleId;


    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    const APPROVED = 'APPROVED';

    public function __construct(?int $id,
                                string $title,
                                string $status,
                                string $content,
                                Datetime $createdAt,
                                $createdBy,
                                $articleId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->status = $status;
        $this->content = $content;
        $this->createdAt = new DateTime($createdAt);
        $this->createdBy = $createdBy;
        $this->articleId = $articleId;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        if (is_string($id) && intval($id) > 0) {
            $this->id = intval($id);
        }
        if (is_int($id) && $id > 0) {
            $this->id = $id;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        if (mb_strlen($title) <= 255) {
            $this->title = $title;
        } else {
            $this->title = substr($title, 0, 255);
        }
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = strip_tags($content, ['p', 'a', 'i']);
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreated_at($createdAt)
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

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function setCreated_by($user)
    {
        $this->createdBy = $user;
    }


    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        /**
         * Pending status by default for new comments
         */
        $status = $status ?? $this::PENDING;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @param mixed $articleId
     * @return Comment
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
        return $this;
    }

//    /**
//     * @return mixed
//     */
//    public function getUserId()
//    {
//        return $this->userId;
//    }
//
//    /**
//     * @param mixed $userId
//     * @return Comment
//     */
//    public function setUserId($userId)
//    {
//        $this->userId = $userId;
//        return $this;
//    }

}