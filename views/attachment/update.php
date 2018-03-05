<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */

$this->title = 'Update Attachment: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Attachments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->attachmentID, 'url' => ['view', 'id' => $model->attachmentID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attachment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
