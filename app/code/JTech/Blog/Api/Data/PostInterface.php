<?php

namespace JTech\Blog\Api\Data;

interface PostInterface
{
    const POST_ID       = 'post_id';
    const TITLE         = 'title';
    const CONTENT       = 'content';
    const CREATED_AT    = 'created_at';

    /**
     * Get title
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * Get Content
     * @return string|null
     */
    public function getContent(): ?string;

    /**
     * Get Created At
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Get Id
     * @return int|null
     */
    public function getId(): ?int;


    /**
     * Set title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Set content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Set created at
     *
     * @param int $created_at
     * @return $this
     */
    public function setCreatedAt($created_at);

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

}
