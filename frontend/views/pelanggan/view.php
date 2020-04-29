<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pelanggan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pelanggan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jenis_pel',
            'pic',
            'nama',
            'id_kota',
            'id_kec',
            'id_kelurahan',
            'alamat',
            'rt',
            'rw',
            'hp1',
            'hp2',
            'id_tipe',
            'id_merk',
            'id_warna',
            'id_kategori',
            'id_kategori_baru',
            'id_sales',
            'tgl_simpan',
            'tgl_kategori',
        ],
    ]) ?>

</div>
