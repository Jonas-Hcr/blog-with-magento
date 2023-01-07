<?php

namespace JTech\Blog\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class View implements HttpGetActionInterface
{
    const REGISTRY_KEY_POST_ID = 'jtech_blog_post_id';

    /**
     * Core registry
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;
    protected $_request;

    /**
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     *
     * @codeCoverageIgnore
     *  @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        Registry $coreRegistry,
        PageFactory $resultPageFactory
    ) {
        $this->_request = $request;
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Saves the blog id to the register and renders the page
     * @return Page
     * @throws LocalizedException
     */
    public function execute()
    {
        $this->_coreRegistry->register(self::REGISTRY_KEY_POST_ID, (int) $this->_request->getParam('id'));
        return $this->_resultPageFactory->create();
    }
}
