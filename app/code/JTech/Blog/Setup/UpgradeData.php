<?php

namespace JTech\Blog\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface
{

    /**
     * @inheritDoc
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion() && version_compare($context->getVersion(), '1.0.0' < 0)) {
            $tableName = $setup->getTable('jtech_blog_post');

            $data = [
                [
                    'title' => 'Post 1 Title',
                    'content' => 'Content of the First post. <br> Hello World'
                ],
                [
                    'title' => 'Post 2 Title',
                    'content' => 'Content of the second post. <br> Hello World 2'
                ],
            ];

            $setup->getConnection()
                ->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}
