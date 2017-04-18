<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `member_artist`.
 */
class m170401_135119_create_member_artist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%member_artist}}', [
            'id_member' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_artist' => Schema::TYPE_INTEGER . ' NOT NULL'
            ]);
        $this -> addForeignKey(
            'fk-member_artist-id_member',
            'member_artist',
            'id_member',
            'member',
            'id_member',
            'RESTRICT'
            );
        $this -> addForeignKey(
            'fk-member_artist-id_artist',
            'member_artist',
            'id_artist',
            'artist',
            'id_artist',
            'RESTRICT'
            );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        if ($this->db->schema->getTableSchema('{{%member_artist}}', true) !== null) {
        $this->dropTable('{{%member_artist}}');
        $this -> dropForeignKey(
            'fk-member_artist-id_member',
            'member_artist'
            );
        $this -> dropForeignKey(
            'fk-member_artist-id_artist',
            'member_artist'
            );
    }
    return true;
    }
}

