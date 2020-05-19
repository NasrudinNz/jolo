<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupervisorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supervisors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supervisor-index">


    <?php #echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        #'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            'alamat',
            'hp1',
            //'tgl_simpan',
            //'aktif',
            #'username',
            //'pass',
            //'os_id:ntext',
        ],
    ]); ?>


</div>
