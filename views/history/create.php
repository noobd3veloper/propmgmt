<?php

use yii\helpers\Html;
use app\models\Tenant;

/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = 'Create History';
$this->params['breadcrumbs'][] = ['label' => Tenant::findOne(Yii::$app->getRequest()->getQueryParam('tenantID'))->getFullName(), 'url' => ['tenant/view', 'id'=>Yii::$app->getRequest()->getQueryParam('tenantID')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
