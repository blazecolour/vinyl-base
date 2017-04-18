<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170405_120347_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id_user' => Schema::TYPE_PK,
            'username' => 'VARCHAR(255)' . ' NOT NULL',
            'password' => 'VARCHAR(64)' . ' NOT NULL',
            'create_time' => Schema::TYPE_TIMESTAMP,
            'email' => 'VARCHAR(45)',
            'user_info' => Schema::TYPE_TEXT,
            'image' => 'VARCHAR(255)'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
      if ($this->db->schema->getTableSchema('{{%user}}', true) !== null) {
        $this->dropTable('{{%user}}');
    }
    return true;
    }
}
