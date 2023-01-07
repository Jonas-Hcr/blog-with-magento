<?php

namespace JTech\Blog\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use JTech\Blog\Model\Post;
use JTech\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use JTech\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;

class Posts extends Template
{

    /**
     * PostCollectionFactory
     * @var null|PostCollectionFactory
     */
    protected $_postCollectionFactory = null;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PostCollectionFactory $postCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        PostCollectionFactory $postCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_postCollectionFactory = $postCollectionFactory;
    }

    /**
     * @return array
     */
    public function getPosts()
    {
        /** @var PostCollection $postCollection */
        $postCollection = $this->_postCollectionFactory->create();
        $postCollection->addFieldToSelect('*')->load();
        return $postCollection->getItems();
    }

    /**
     * For a given post, returns its url
     * @param Post $post
     * @return string
     */
    public function getPostUrl(
        Post $post
    )
    {
        return '/blog/post/view/id/' . $post->getId();
    }

}
