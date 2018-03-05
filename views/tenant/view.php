<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tenant */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Tenants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tenantID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tenantID], [
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
            //'tenantID',
            'tenantSurname',
            'tenantGivenName',
            'tenantMiddleName',
            'tenantBirthdate',
            'tenantSSN',
            [
            	'attribute' => 'createdBy',
            	'value' => $model->createdBy0->getFullName()
            ],
            [
            	'attribute' => 'createdDate',
            	'value' => date('l \t\h\e jS \of F Y h:i:s A', $model->createdDate)
            ],
            [
            	'attribute' => 'modifiedBy',
            	'value' => (is_null($model->modifiedBy)) ? null : $model->modifiedBy0->getFullName()
            ],
                        [
            	'attribute' => 'modifiedDate',
            	'value' => (is_null($model->modifiedDate)) ? null : date('l \t\h\e jS \of F Y h:i:s A', $model->modifiedDate)
            ],
        ],
    ]) ?>

</div>
