<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tenant */

$this->title = 'Update Tenant: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tenants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tenantID, 'url' => ['view', 'id' => $model->tenantID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tenant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
