<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m170430_111601_create_country_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%country}}', [
            'id_country' => Schema::TYPE_PK,
            'country_name' => 'VARCHAR(255)' . ' NOT NULL',
            ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        if ($this->db->schema->getTableSchema('{{%country}}', true) !== null) {
            $this->dropTable('{{%country}}');
        }
        return true;
    }
}
