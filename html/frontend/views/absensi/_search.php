<?php

use app\models\Sales;
use app\models\Supervisor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AbsensiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->dropDownList(
        ArrayHelper::map(Supervisor::find()->all(),'id','nama'),
        ['prompt'=>'',
        'onchange'=>'
        $.post( "'.Yii::$app->urlManager->createUrl('absensi/lists?id=').'"+$(this).val(), function( data ) {
        $( "select#nama" ).html( data );
        $("input#target").val($(this).val());
        });'
        ]);

        $dataPost=ArrayHelper::map(Sales::find()->asArray()->all(), 'id', 'nama');
        echo $form->field($model, 'id_sales')
        ->dropDownList(
        $dataPost,
        ['id'=>'nama']
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
