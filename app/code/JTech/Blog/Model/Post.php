<?php

namespace JTech\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use JTech\Blog\Api\Data\PostInterface;

/**
 * Class File
 * @package JTech\Blog\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Post extends AbstractModel implements PostInterface, IdentityInterface
{
    const CACHE_TAG = 'jtech_blog_post';

    public function _construct()
    {
        $this->_init('JTech\Blog\Model\ResourceModel\Post');
    }

    public function getTitle(): ?string
    {
        return $this->getData(self::TITLE);
    }

    public function getContent(): ?string
    {
        return $this->getData(self::CONTENT);
    }

    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function getId(): ?int
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * RETURN IDENTITIES
     * @return string[]
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function setTitle($title): Post
    {
        return $this->setData(self::TITLE, $title);
    }

    public function setContent($content): Post
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function setCreatedAt($created_at): Post
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    public function setId($id): Post
    {
        return $this->setData(self::POST_ID, $id);
    }
}
