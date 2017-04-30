<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `condition`.
 */
class m170430_114700_create_condition_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%condition}}', [
            'id_condition' => Schema::TYPE_PK,
            'media' => $this->string(255),
            'sleeve' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        if ($this->db->schema->getTableSchema('{{%condition}}', true) !== null) {
        $this->dropTable('{{%condition}}');
    }
    return true;
}
}
