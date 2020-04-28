<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Sales extends ActiveRecord
{

  public static function tableName()
  {
    return 'customer';
  }

  public function behaviors()
  {
    return[
      [
      'class' => TimestampBehavior::class,
      'createdAtAttribute' => 'createdAt',
      'updatedAtAttribute' => 'updatedAt',
      'value' => date("Y-m-d H:i:s")
      ]
    ];
  }   
 
  public function rules()
  {
    return[
      [['nama','alamat','hp1','hp2'], 'string'],
    ];
  }
}