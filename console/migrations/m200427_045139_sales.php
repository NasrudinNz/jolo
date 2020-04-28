<?php

use app\models\Sales;
use yii\db\Migration;

/**
 * Class m200427_045139_sales
 */
class m200427_045139_sales extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(Sales::tableName(),[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string()->notNull(),
            'alamat'=>$this->string()->notNull(),
            'hp1'=>$this->string(),
            'hp2'=>$this->string(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable(Sales::tableName());
    }
}
