<?php

namespace JTech\Blog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('jtech_blog_post');

        if (!$setup->getConnection()->isTableExists($tableName)) {
            $table = $setup->getConnection()
                    ->newTable($tableName)
                    ->addColumn(
                        'post_id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'primary' => true,
                            'identity' => true,
                            'unsigned' => true,
                            'nullable' => false,
                        ],
                        'ID'
                    )
                    ->addColumn(
                        'title',
                        Table::TYPE_TEXT,
                        null,
                        [
                            'nullable' => false,
                        ],
                        'Title'
                    )
                    ->addColumn(
                        'content',
                        Table::TYPE_TEXT,
                        null,
                        [
                            'nullable' => false,
                        ],
                        'Content'
                    )
                    ->addColumn(
                        'created_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        [
                            'default' => Table::TIMESTAMP_INIT,
                            'nullable' => false,
                        ],
                        'ID'
                    )
                    ->setComment('JTech Blog - Posts');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
