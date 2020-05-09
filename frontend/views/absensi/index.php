<?php

use app\models\Sales;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView as KGridView;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;

$js=<<<js
$('.modalButton').on('click', function () {
    $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
});
js;
$this->registerJs($js);

?>
<div class="absensi-index">

    <?php  #echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>

    <!--
    <p>
        <a class="btn btn-primary modalButton" value="<?= Url::to(['absensi/search']) ?>">Filter</a>
    </p> -->

    <?= KGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'panel' => [
            'type' => KGridView::TYPE_DANGER,
        ],           
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],           
            
            [
                'attribute' => 'tgl',
                'format' => ['date', 'php:d-m-Y H:i:s'],
                'filterType' => KGridView::FILTER_DATE,
                   'filterWidgetOptions' => [
                   'value' => date('Y-m-d'),
                   'size' => 'xs',
                   'pluginOptions' => [
                      'format' => 'dd-mm-yyyy',
                      'autoWidget' => true,
                      'autoclose' => true,
                      'todayHighlight' => true
                    ]
                 ],
            ],

            [
                'attribute' => 'id_sales',
                'label'=>'Sales',
                'value'=>'SalesName',
                'filter'=>ArrayHelper::map(Sales::find()->asArray()->all(), 'id', 'nama'),
            ],
            
            'alamat:ntext',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

    <?php
        Modal::begin([
            'header' => 'Modal',
            'id' => 'modal',
            'size' => 'modal-md',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>