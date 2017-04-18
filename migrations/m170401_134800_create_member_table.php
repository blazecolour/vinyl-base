<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `member`.
 */
class m170401_134800_create_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%member}}', [
            'id_member' => Schema::TYPE_PK,
            'name' => 'VARCHAR(45)' . ' NOT NULL',
            'surname' => 'VARCHAR(45)',
            'description' => Schema::TYPE_TEXT
            ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        if ($this->db->schema->getTableSchema('{{%member}}', true) !== null) {
        $this->dropTable('{{%member}}');
    }
    return true;
    }
}
