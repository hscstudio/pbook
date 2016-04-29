<?php

use yii\db\Migration;

class m160422_071542_create_book_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		$this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
			'title' => $this->string(255)->notNull(),
            'author' => $this->string(100),
            'publisher' => $this->string(50),
            'city' => $this->string(50),
            'year' => $this->smallInteger(4),            
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%book}}');
    }
}
