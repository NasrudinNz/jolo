<?php

use app\models\Supervisor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SupervisorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supervisor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->dropDownList(
        ArrayHelper::map(Supervisor::find()->all(),'id','nama'),
        ['prompt'=>'',
        'onchange'=>'
        $.post( "'.Yii::$app->urlManager->createUrl('supervisor/lists?id=').'"+$(this).val(), function( data ) {
        $( "select#nama" ).html( data );
        });'
        ]);

        $dataPost=ArrayHelper::map(Supervisor::find()->asArray()->all(), 'id', 'nama');
        echo $form->field($model, 'nama')
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
