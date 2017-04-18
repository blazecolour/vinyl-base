<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `release`.
 */
class m170401_150451_create_release_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%release}}', [
            'id_release' => Schema::TYPE_PK,
            'title' => 'VARCHAR(255)' . ' NOT NULL',
            'released' => Schema::TYPE_DATE,
            'genre' => 'VARCHAR(45)',
            'notes' => Schema::TYPE_TEXT,
            'image' => 'VARCHAR(255)',
            'id_artist' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_label' => Schema::TYPE_INTEGER,
            'id_format' => Schema::TYPE_INTEGER
            ]);
            $this -> addForeignKey(
            'fk-release-id_artist',
            'release',
            'id_artist',
            'artist',
            'id_artist',
            'RESTRICT'
            );
            $this -> addForeignKey(
            'fk-release-id_label',
            'release',
            'id_label',
            'label',
            'id_label',
            'RESTRICT'
            );
            $this -> addForeignKey(
            'fk-release-id_format',
            'release',
            'id_format',
            'format',
            'id_format',
            'RESTRICT'
            );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        if ($this->db->schema->getTableSchema('{{%release}}', true) !== null) {
            $this->dropTable('{{%release}}');
             $this -> dropForeignKey(
            'fk-release-id_artist',
            'release'
            );
              $this -> dropForeignKey(
            'fk-release-id_label',
            'release'
            );
            $this -> dropForeignKey(
            'fk-release-id_format',
            'release'
            );


        }
        return true;
    }
}