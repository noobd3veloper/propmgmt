<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = 'History of ' . $model->tenant->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Tenant', 'url' => ['tenant/view', 'id' => $model->tenantID]];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->getIdentity()->id == $model->createdBy0->id) : ?>
            <?= Html::a('Update', ['update', 'id' => $model->historyID], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->historyID], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'historyID',
            //'tenantID',
            'historyStartDate',
            'historyEndDate',
            'historyStatus',
            'historyDetail:ntext',
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
