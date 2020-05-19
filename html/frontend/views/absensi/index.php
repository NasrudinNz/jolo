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

    <!--<p>
        <a class="btn btn-danger modalButton" value="<?= Url::to(['absensi/search']) ?>">Filter</a>
    </p>-->

    <?= KGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => false,
        'resizableColumns'=>true,
        'hover' => true,
        'panel' => [
            'type' => KGridView::TYPE_DANGER,
        ],   
        'toolbar' =>  [
            [
                'content' =>
                Html::a('RESET', ['index'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')]),
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'export' => [
            'fontAwesome' => true
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
                 'headerOptions' => ['style' => 'width:20%'],
            ],

            [
                'attribute' => 'id_sales',
                'label'=>'Sales',
                'value'=>'SalesName',
                'filterType' => KGridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(Sales::find()->asArray()->all(), 'id', 'nama'),
                'headerOptions' => ['style' => 'width:30%'],
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih sales --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
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