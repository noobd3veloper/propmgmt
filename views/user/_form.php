<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Role;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userPassword')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'userAuthKey')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'userAccessToken')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'userEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userGivenName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userSurname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userResetToken')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'companyName')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'roleID')->dropdownList(ArrayHelper::map(Role::find()->indexBy('roleID')->all(), 'roleID', 'roleName'), ['prompt'=>Yii::t('app', 'Select Role')]) ?>

    <?= $form->field($model, 'startdate')->widget(\yii\jui\DatePicker::classname(), ['options' => ['class' => 'form-control'],'model'=>$model,
                    'attribute'=>'startdate',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeYear' => true,
                        'changeMonth' => true
                        ]
                    ]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'createdBy')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'createdDate')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
