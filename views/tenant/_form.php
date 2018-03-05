<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Tenant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tenantSurname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenantGivenName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenantMiddleName')->textInput(['maxlength' => true]) ?>
    <label class="control-label" for="tenant-tenantbirthdate">Date of Birth</label>
    <?= DatePicker::widget([
        'id' => 'tenant-tenantbirthdate',
        'name' => 'Tenant[tenantBirthdate]', 
        'value' => $model->tenantBirthdate,
        'type' => DatePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Select Birthdate'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>
    <!--<?= $form->field($model, 'tenantBirthdate')->textInput() ?>-->

    <?= $form->field($model, 'tenantSSN')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
