<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TenantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'tenantID') ?>

    <?= $form->field($model, 'tenantSurname') ?>

    <?= $form->field($model, 'tenantGivenName') ?>

    <?= $form->field($model, 'tenantMiddleName') ?>

    <?= $form->field($model, 'tenantBirthdate') ?>

    <?php // echo $form->field($model, 'tenantSSN') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'createdDate') ?>

    <?php // echo $form->field($model, 'modifiedBy') ?>

    <?php // echo $form->field($model, 'modifiedDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
