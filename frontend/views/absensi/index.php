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
                'attribute' => 'id_sales',
                'label'=>'Sales',
                'value'=>'SalesName',
                'filter'=>ArrayHelper::map(Sales::find()->asArray()->all(), 'id', 'nama'),
            ],
            'tgl',
            'alamat:ntext',
        ],
    ]); ?>
    <?php Pjax::end(); ?>


</div>
