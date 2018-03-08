<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TenantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tenants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tenant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'tenantID',
            'tenantSurname',
            'tenantGivenName',
            'tenantMiddleName',
            [
                'attribute' => 'tenantBirthdate',
                'value' => 'tenantBirthdate',
                'filter' => \yii\jui\DatePicker::widget(['options' => ['class' => 'form-control', 'showAnim'=>'slide','showOtherMonths'=>true],'model'=>$searchModel,
                    'attribute'=>'tenantBirthdate',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeYear' => true,
                        'changeMonth' => true,
                        'yearRange'=>'1901:*',
                        ]
                    ]),
                
                'format' => 'html',
            ],
            'tenantSSN',
            //'createdBy',
            //'createdDate',
            //'modifiedBy',
            //'modifiedDate',

            [
			    'class' => 'yii\grid\ActionColumn',
			    'template' => '{view} {update} {delete}',
			    'visibleButtons' => [
			        'view' => true,
			        'update' => true,
			        'delete' => true,
			    ]
			],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
