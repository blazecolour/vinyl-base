<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 * Has foreign keys to the tables:
 *
 * - `country`
 */
class m170430_112221_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%city}}', [
            'id_city' => Schema::TYPE_PK,
            'id_country' => Schema::TYPE_INTEGER,
            'city_name' => 'VARCHAR(255)' . ' NOT NULL'
            ]);

        // add foreign key for table `country`
        $this->addForeignKey(
            'fk-city-id_country',
            'city',
            'id_country',
            'country',
            'id_country',
            'RESTRICT'
            );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        if ($this->db->schema->getTableSchema('{{%city}}', true) !== null) {
            $this->dropTable('{{%city}}');
            $this -> dropForeignKey(
                'fk-city-id_country',
                'city'
                );
        }
        return true;
    }
}
