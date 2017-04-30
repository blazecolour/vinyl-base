<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles adding surname to table `user`.
 */
class m170430_103907_add_surname_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'surnamename', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'surnamename');
    }
}
