<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Rent History Info';
//var_dump(Yii::$app->user->getIdentity())
?>

<div class="site-index">
    <div class="jumbotron">
        <h1>RENT HISTORY INFO</h1>

        <p class="lead">Get them before they get you</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>1 Month Subscription</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><?=  Html::a('Contact us', ['site/contact'], ['class'=>'btn btn-default']); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>6 Months Subscription</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><?=  Html::a('Contact us', ['site/contact'], ['class'=>'btn btn-default']); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>1 Year Subscription</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><?=  Html::a('Contact us', ['site/contact'], ['class'=>'btn btn-default']); ?></p>
            </div>
        </div>

    </div>
</div>
