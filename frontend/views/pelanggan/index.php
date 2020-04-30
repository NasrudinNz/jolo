<?php

use app\models\KategoriPel;
use app\models\Sales;
use app\models\SetDesa;
use app\models\SetKec;
use app\models\SetKota;
use app\models\SetMerk;
use app\models\SetWarna;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView as KGridView;
use kartik\select2\Select2;
use PharIo\Manifest\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pelanggan';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="pelanggan-index">
 
    <?php #echo $this->render('_search', ['model' => $searchModel]); ?>
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

            'nama',
            [
                'attribute' => 'id_kategori',
                'label'=>'Kategori',
                'value'=>'KategoriName',
                'filter'=>ArrayHelper::map(KategoriPel::find()->asArray()->all(), 'id', 'nama'),
            ],
            [
                'attribute' => 'tgl_kategori',
                'label' => 'Tgl. Update'
            ],

            [
                'attribute' => 'id_sales',
                'label'=>'Nama Sales',
                'value'=>'SalesName',
                'filter'=>ArrayHelper::map(Sales::find()->asArray()->all(), 'id', 'nama'),
            ],


            [
                'attribute' => 'id_merk',
                'label'=>'Merk',
                'value'=>'MerkName',
                'filter'=>ArrayHelper::map(SetMerk::find()->asArray()->all(), 'id', 'nama'),
            ],
            [
                'attribute' => 'id_tipe',
                'label'=>'Tipe',
                'value'=>'TipeName',
                'filter'=>ArrayHelper::map(SetMerk::find()->asArray()->all(), 'id', 'nama'),
            ],
            [
                'attribute' => 'id_warna',
                'label'=>'Warna',
                'value'=>'WarnaName',
                'filter'=>ArrayHelper::map(SetWarna::find()->asArray()->all(), 'id', 'nama'),
            ],

            [
                'attribute' => 'id_kota',
                'label'=>'Kota',
                'value'=>'KotaName',
                'filter'=>ArrayHelper::map(SetKota::find()->asArray()->all(), 'id', 'nama'),
            ],
            [
                'attribute' => 'id_kec',
                'label'=>'Kecamatan',
                'value'=>'KecName',
                'filter'=>ArrayHelper::map(SetKec::find()->asArray()->all(), 'id', 'nama'),
            ],
            [
                'attribute' => 'id_kelurahan',
                'label'=>'Kelurahan',
                'value'=>'DesaName',
            ],
            'alamat',
            'rt',
            'rw',

            'hp1',
            'hp2',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>