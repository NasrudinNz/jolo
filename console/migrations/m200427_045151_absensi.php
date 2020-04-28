<?php

use frontend\models\Absensi;
use yii\db\Migration;

/**
 * Class m200427_045151_absensi
 */
class m200427_045151_absensi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable(Absensi::tableName());
    }
}
