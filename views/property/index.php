<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\alert\AlertBlock;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
echo AlertBlock::widget([
    'useSessionFlash' => true,
    'delay' => 500,
    'type' => AlertBlock::TYPE_GROWL 
]);

?>

<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'propertyID',
            'propertyName',
            'propertyLocation',
            //'createdBy',
            //'createDate',
            //'modifiedBy',
            //'modifiedDate',

           [
			    'class' => 'yii\grid\ActionColumn',
			     'template' => '{view} {update} {delete}',
			    'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'Show'),
                ]);
            },

            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Edit'),
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                ]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='index.php?r=property/view&id='.$model->propertyID;
                return $url;
            }

            if ($action === 'update') {
                $url ='index.php?r=property/update&id='.$model->propertyID;
                return $url;
            }
            if ($action === 'delete') {
                $url ='index.php?r=property/delete&id='.$model->propertyID;
                return $url;
            }

          }
			],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
