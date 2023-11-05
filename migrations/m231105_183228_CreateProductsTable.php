<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m231105_183228_CreateProductsTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->null(),
            'price' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('products');
    }
}