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
    
    <?= $form->field($model, 'tenantBirthdate')->widget(\yii\jui\DatePicker::classname(), ['options' => ['class' => 'form-control'],'model'=>$model,
                    'attribute'=>'tenantBirthdate',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeYear' => true,
                        'changeMonth' => true
                        ]
                    ]) ?>
    <!--<?= $form->field($model, 'tenantBirthdate')->textInput() ?>-->

    <?= $form->field($model, 'tenantSSN')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
