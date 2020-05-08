<?php

use app\models\Sales;
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView as KGridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

    <?php  #echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?= KGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'bordered' => true,
        'resizableColumns' => true,
        'striped'=>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            
            [
                'attribute' => 'tgl',
                'format' => 'date',
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