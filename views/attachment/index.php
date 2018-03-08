<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AttachmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attachments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Attachment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
        Modal::begin([
                'header' => '<h4 id="filename"></h4>',
                'id'     => 'model',
                'size'   => 'model-lg',
        ]);
        echo "<div><img id='modelContent' src='' class='img-responsive'></div>";
        Modal::end();    
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'attachmentID',
            'historyID',
            'attachmentName',
            [
                'attribute' => 'Image',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->attachmentName!='')
                     return Html::img("data:image/jpeg;base64," . base64_encode($model->attachmentFile), 
                     ["id"=>$model->attachmentID, 
                     "name"=>$model->attachmentName,
                     "data-target"=>"#modal-default",
                     "data-toggle"=>"modal",
                     "height"=>'200px',
                     "width"=>'200px']) ; else return 'no image';
                },
              ],
            'createdBy',
            //'createdDate',
            //'modifiedBy',
            //'modifiedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
