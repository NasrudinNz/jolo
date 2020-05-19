<?php

use app\models\KategoriPel;
use app\models\Sales;
use app\models\SetDesa;
use app\models\SetKec;
use app\models\SetKota;
use app\models\SetMerk;
use app\models\SetTipe;
use app\models\SetWarna;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView as KGridView;
use kartik\select2\Select2;
use PharIo\Manifest\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url as HelpersUrl;
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
        'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'persistResize' => false,
        'panel' => [
            'type' => KGridView::TYPE_DANGER,
        ],      
        'toolbar' =>  [
            ['content'=>
            Html::a('RESET', ['index'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')]),
            ],
            '{toggleData}',
            '{export}',            
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'export' => [
            'fontAwesome' => true
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            [
                'attribute' => 'id_kategori',
                'label'=>'Kategori',
                'value'=>'KategoriName',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(KategoriPel::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih kategori --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
            ],
            [
                'attribute' => 'tgl_kategori',
                'label' => 'Tgl. Update'
            ],

            [
                'attribute' => 'id_sales',
                'label'=>'Nama Sales',
                'value'=>'SalesName',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(Sales::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih sales --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
            ],


            [
                'attribute' => 'id_merk',
                'label'=>'Merk',
                'value'=>'MerkName',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(SetMerk::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih merk --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
            ],
            [
                'attribute' => 'id_tipe',
                'label'=>'Tipe',
                'value'=>'TipeName',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(SetTipe::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih tipe --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
            ],
            [
                'attribute' => 'id_warna',
                'label'=>'Warna',
                'value'=>'WarnaName',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(SetWarna::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih warna --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
            ],

            [
                'attribute' => 'id_kota',
                'label'=>'Kota',
                'value'=>'KotaName',                
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(SetKota::find()->where(['provinsi_id' => 35])->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih kota --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
            ],
            [
                'attribute' => 'id_kec',
                'label'=>'Kecamatan',
                'value'=>'KecName',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2, 
                'filter'=>ArrayHelper::map(SetKec::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'options' => ['prompt' => '-- Pilih kecamatan --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ],
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