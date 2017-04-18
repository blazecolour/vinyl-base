<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `artist`.
 */
class m170401_133748_create_artist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%artist}}', [
            'id_artist' => Schema::TYPE_PK,
            'artist_name' => 'VARCHAR(255)' . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'site' => 'VARCHAR(45)',
            'image' => 'VARCHAR(255)'
            ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
     if ($this->db->schema->getTableSchema('{{%artist}}', true) !== null) {
        $this->dropTable('{{%artist}}');
    }
    return true;
}
}

