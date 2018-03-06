<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord): ?>
        <?php $model->tenantID = Yii::$app->getRequest()->getQueryParam('tenantID') ?>
    <?php endif ?>
    
    
    <?= $form->field($model, 'tenantID')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'historyStartDate')->widget(\yii\jui\DatePicker::classname(), ['options' => ['class' => 'form-control'],'model'=>$model,
                    'attribute'=>'historyStartDate',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeYear' => true,
                        'changeMonth' => true
                        ]
                    ]) ?>

    <?= $form->field($model, 'historyEndDate')->widget(\yii\jui\DatePicker::classname(), ['options' => ['class' => 'form-control'],'model'=>$model,
                    'attribute'=>'historyEndDate',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeYear' => true,
                        'changeMonth' => true
                        ]
                    ]) ?>

    <?= $form->field($model, 'historyStatus')->dropDownList([ 'GOOD' => 'GOOD', 'BAD' => 'BAD', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'historyDetail')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
