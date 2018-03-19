<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\password\PasswordInput;
/* @var $this yii\web\View */
/* @var $model app\models\ChangePasswordForm */
/* @var $form ActiveForm */
 
$this->title = 'Change Password';
?>
<div class="user-changePassword">
 
    <?php $form = ActiveForm::begin(); ?>
 
        <?= $form->field($model, 'password')->widget(PasswordInput::classname(), [
    'pluginOptions' => [
        'showMeter' => true,
        'toggleMask' => false
    ]
]); ?>
        <?= $form->field($model, 'confirm_password')->widget(PasswordInput::classname(), [
    'pluginOptions' => [
        'showMeter' => true,
        'toggleMask' => false
    ]
]); ?>
 
        <div class="form-group">
            <?= Html::submitButton('Change', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
 
</div>