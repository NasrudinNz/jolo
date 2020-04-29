<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

<?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        #'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'tgl',
            'alamat:ntext',
        ],
    ]); ?>
    <?php Pjax::end(); ?>


</div>
