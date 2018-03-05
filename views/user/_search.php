<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'userID') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'userPassword') ?>

    <?= $form->field($model, 'userAuthKey') ?>

    <?= $form->field($model, 'userAccessToken') ?>

    <?php // echo $form->field($model, 'roleID') ?>

    <?php // echo $form->field($model, 'userEmail') ?>

    <?php // echo $form->field($model, 'userGivenName') ?>

    <?php // echo $form->field($model, 'userSurname') ?>

    <?php // echo $form->field($model, 'userResetToken') ?>

    <?php // echo $form->field($model, 'companyName') ?>

    <?php // echo $form->field($model, 'startdate') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'createdDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
