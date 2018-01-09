<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180108_194007_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('xproducts', [
            'id'          => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name'        => $this->string()->notNull(),
            'price'       => $this->double()->null(),
            'summary'     => $this->string()->null(),
            'description' => $this->string()->null(),

            'status'     => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->null()->comment("Creation date"),
            'updated_at' => $this->integer()->null()->comment("Update date"),
        ], $tableOptions);

        $this->createTable('xcategories', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string()->notNull(),
            'summary'     => $this->string()->null(),
            'description' => $this->string()->null(),

            'status'     => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->null()->comment("Creation date"),
            'updated_at' => $this->integer()->null()->comment("Update date"),
        ], $tableOptions);

        $this->createIndex('idx-xproducts-category_id', 'xproducts', 'category_id');

        $this->addForeignKey('fk_xproducts_xcategories', 'xproducts', 'category_id', 'xcategories', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_xproducts_xcategories', 'xproducts');

        $this->dropIndex('idx-xproducts-category_id', 'xproducts');

        $this->dropTable('xproducts');
        $this->dropTable('xcategories');
    }
}
