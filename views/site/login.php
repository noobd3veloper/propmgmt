<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    body {
      background-color: #FFFFFF;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <img src="assets/images/logo.png" class="image">
            <div class="content">
                <?= Html::encode($this->title) ?>
            </div>
        </h2>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'labelOptions' => ['class' => 'ui large form'],
            ],
            ]); ?>
            <div class="ui stacked segment">
                <div class="field">
                    <?= $form->field($model, 'username',
                    [
                    'template' => '
                        <div class="ui left icon input">
                        <i class="user icon"></i>
                        {input}
                    </div>',
                    'inputOptions' => 
                        [
                            'placeholder' => 'Username',
                            'autofocus' => true
                        ]
                    ]
                    )->textInput()->label(false) ?>
                </div>
                <div class="field">
                    <?= $form->field($model, 'password',
                    [
                    'template' => '
                        <div class="ui left icon input">
                        <i class="lock icon"></i>
                        {input}
                    </div>',
                    'inputOptions' => 
                        [
                            'placeholder' => 'Password',
                        ]
                    ]
                    )->passwordInput()->label(false)?>
                </div>
                <?= Html::submitButton('Login', ['class' => 'ui large teal button', 'name' => 'login-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>
   </div> 
</div>
