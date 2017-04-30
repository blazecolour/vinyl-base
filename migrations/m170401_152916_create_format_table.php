<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `format`.
 */
class m170401_152916_create_format_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%format}}', [
            'id_format' => Schema::TYPE_PK,
            'format_type' => 'VARCHAR(255)' . ' NOT NULL'
            ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
     if ($this->db->schema->getTableSchema('{{%format}}', true) !== null) {
        $this->dropTable('{{%format}}');
    }
    return true;
    }
}

