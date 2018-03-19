<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if (Yii::$app->user->getIdentity()->roleID == 1) : ?>
        <?= Html::a('Update', ['update', 'id' => $model->userID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'userID',
            'username',
            //'userPassword',
            //'userAuthKey',
            //'userAccessToken',
            [
            	'attribute' => 'roleID',
            	'label' => 'Role',
            	'value' => function($model) {
            		return ($model->roleID == null) ? null : $model->role->roleName;
            	}
            ],
            'userEmail:email',
            'userGivenName',
            'userSurname',
            //'userResetToken',
            'companyName',
            'startdate',
            'duration',
            [
            	'attribute' => 'createdBy',
            	'value' => $model->createdBy0->getFullNameWithCompany()
            ],
            [
            	'attribute' => 'createdDate',
            	'value' => date('l \t\h\e jS \of F Y h:i:s A', $model->createdDate)
            ],
        ],
    ]) ?>

</div>
