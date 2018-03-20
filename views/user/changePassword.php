<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\password\PasswordInput;
/* @var $this yii\web\View */
/* @var $model app\models\ChangePasswordForm */
/* @var $form ActiveForm */
 
$this->title = 'Change Password';
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>ReNt</b>Info</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Change your password</p>
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
            
            <div class="row">
                <div class="col-xs-8">
                    
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton('Change', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                    
                </div>
                <!-- /.col -->
            </div>
                <?php ActiveForm::end(); ?>
            
            </div>
    </div>
</div>