<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles adding verified to table `user`.
 */
class m170430_104618_add_verified_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'token', $this->string(255));
        $this->addColumn('user', 'verified', $this->integer(11));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'token');
        $this->dropColumn('user', 'verified');
    }
}
