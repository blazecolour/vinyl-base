<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles adding name to table `user`.
 */
class m170430_103808_add_name_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'name', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'name');
    }
}
