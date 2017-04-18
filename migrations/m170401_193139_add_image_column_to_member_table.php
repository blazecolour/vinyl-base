<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles adding image to table `member`.
 */
class m170401_193139_add_image_column_to_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('member', 'image', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('member', 'image');
    }
}
