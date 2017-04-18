<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `label`.
 */
class m170401_134304_create_label_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%label}}', [
            'id_label' => Schema::TYPE_PK,
            'label_name' => 'VARCHAR(45)' . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'email' => 'VARCHAR(45)',
            'site' => 'VARCHAR(45)',
            'contact_info' => 'VARCHAR(255)',
            'image' => 'VARCHAR(255)'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
      if ($this->db->schema->getTableSchema('{{%label}}', true) !== null) {
        $this->dropTable('{{%label}}');
    }
    return true;
    }
}

