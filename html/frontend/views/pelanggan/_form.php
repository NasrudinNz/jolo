<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pelanggan */
/* @var $form yii\widgets\ActiveForm */ 
?>

<div class="pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_pel')->textInput() ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipe')->textInput() ?>

    <?= $form->field($model, 'id_merk')->textInput() ?>

    <?= $form->field($model, 'id_warna')->textInput() ?>

    <?= $form->field($model, 'id_kategori')->textInput() ?>

    <?= $form->field($model, 'id_kategori_baru')->textInput() ?>

    <?= $form->field($model, 'id_sales')->textInput() ?>

    <?= $form->field($model, 'tgl_simpan')->textInput() ?>

    <?= $form->field($model, 'tgl_kategori')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
