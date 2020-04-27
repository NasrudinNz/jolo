<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsensiSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Absensi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_sales',
            'lat',
            'lang',
            'tgl',
            //'alamat:ntext',
            //'app_version',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
