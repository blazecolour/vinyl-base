<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `track`.
 */
class m170401_185445_create_track_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%track}}', [
            'id_track' => Schema::TYPE_PK,
            'track_name' => 'VARCHAR(255)' . ' NOT NULL',
            'side' => 'VARCHAR(45)',
            'time' => 'VARCHAR(45)',
            'id_release' => Schema::TYPE_INTEGER . ' NOT NULL'
            ]);
            $this -> addForeignKey(
            'fk-track-id_release',
            'track',
            'id_release',
            'release',
            'id_release',
            'RESTRICT'
            );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
       if ($this->db->schema->getTableSchema('{{%track}}', true) !== null) {
        $this->dropTable('{{%track}}');
         $this -> dropForeignKey(
            'fk-track-id_release',
            'track'
            );
    }
    return true;
}
}