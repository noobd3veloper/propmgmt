<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */

$this->title = 'Update Attachment';
$this->title = 'Update Attachment:' . $model->attachmentName;
$this->params['breadcrumbs'][] = ['label' => 'History', 'url' => ['history/view', 'id' => $model->history->historyID]];
?>
<div class="attachment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
