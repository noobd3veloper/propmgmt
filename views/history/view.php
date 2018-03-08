<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\bootstrap\Collapse;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use app\models\Attachment;
/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = 'History of ' . $model->tenant->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Tenant', 'url' => ['tenant/view', 'id' => $model->tenantID]];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->getIdentity()->id == $model->createdBy0->id) : ?>
            <?= Html::a('Update', ['update', 'id' => $model->historyID], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->historyID], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
    </p>
     <?php
        Modal::begin([
                'header' => '<h4 id="filename"></h4>',
                'id'     => 'model',
                'size'   => 'model-lg',
                'options' => ['class' => 'modal modal-default fade in '],
                'footer' => Html::a('Update', ['attachment/update','id'=>''], ['class' => 'btn btn-primary', 'id'=>'']),
        ]);
        echo "<div><img id='modelContent' src='' class='img-responsive'></div>";
        Modal::end();  
        
        // Modal::begin([
        //     'header' =>  '<h4 class="modal-title">Add attachment</h4>',
        //         'id'     => 'model',
        //         'size'   => 'model-lg',
        //         'options' => ['class' => 'modal modal-default fade in '],
        // ]);
        
        // //echo '<div class="attachment-form">';
        
        // $form = ActiveForm::begin([
        //         'options'=>['enctype'=>'multipart/form-data', 'id'=>'updateAttachment']
        //         ]);
        
        // $attachmentModel = new Attachment();
        // echo $form->field($attachmentModel, 'attachmentID')->textInput(['maxlength' => true, 'value'=>'99']);
        // var_dump(Html::getAttributeValue($model, '[0]attachmentDetail[0]'));
        // var_dump($attachmentModel->attachmentID);
  

        // ActiveForm::end();
       // Modal::end(); 

    ?>



    <?php
        Modal::begin([
            'header' =>  '<h4 class="modal-title">Add attachment</h4>',
                'id'     => 'model1',
                'size'   => 'model-lg',
                'options' => ['class' => 'modal modal-default fade in '],
        ]);
        
        echo '<div class="attachment-form">';
        $attachmentModel = new Attachment();
        $form = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data'],
                'action'=>['attachment/create']]);
            
     $attachmentModel->historyID = $model->historyID;
     echo $form->field($attachmentModel, 'historyID')->hiddenInput()->label(false);
  
     echo $form->field($attachmentModel, 'attachmentName')->hiddenInput()->label(false);
  
  
     echo $form->field($attachmentModel, 'attachmentFile')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                 'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => true,],
            ]);  
  
      echo "<div class='modal-footer'> " .
              Html::submitButton('Save', ['class' => 'btn btn-success']) .     
            "</div>";
      echo '</div>';

      ActiveForm::end();
        Modal::end();    
    ?> 
        
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'historyID',
            //'tenantID',
            'historyStartDate',
            'historyEndDate',
            'historyStatus',
            'historyDetail:ntext',
            [
            	'attribute' => 'createdBy',
            	'value' => $model->createdBy0->getFullNameWithCompany()
            ],
            [
            	'attribute' => 'createdDate',
            	'value' => date('l \t\h\e jS \of F Y h:i:s A', $model->createdDate)
            ],
            [
            	'attribute' => 'modifiedBy',
            	'value' => (is_null($model->modifiedBy)) ? null : $model->modifiedBy0->getFullNameWithCompany()
            ],
                        [
            	'attribute' => 'modifiedDate',
            	'value' => (is_null($model->modifiedDate)) ? null : date('l \t\h\e jS \of F Y h:i:s A', $model->modifiedDate)
            ],
            
            [
            	'attribute' => '$model->historyID',
                'format' => 'raw',
            	'label' => 'Attachments',
                // 'value' => function($model) {
                //     return ($model->AttachmentDetail == null) ? 
                //       Html::a('<span class="glyphicon glyphicon-plus"/>',['/attachment/create', 'historyID' => $model->historyID ])
                //     : Html::a('<span class="glyphicon glyphicon-plus"/>',['/attachment/create', 'historyID' => $model->historyID ]) . '<table class="table table-bordered dataTable no-footer"> 
                //     <thead>
                //         <tr>
                //             <th>Filename</th><th>Images</th><th></th>
                //         </tr>
                //     </thead>
                //     <tbody>' . $model->AttachmentDetail . '</tbody></table>
                //     ';
                // },
                'value' => function($model){
                    return Html::a('<span class="glyphicon glyphicon-plus"/>','#',['id'=>'addAttachment']) . 
                    Collapse::widget([
                        'options' => ['class'=>'box box-danger', 'data-widget'=>'collapse'],
                        'encodeLabels' => false,
                        'items' => [
                            // equivalent to the above
                            [
                                'label' => '<div class="box-header with-border">
                                <span class="label label-danger">Evidences</span>
                                </div>',
                                'content' =>$model->AttachmentDetail,
                                // open its content by default
                                'contentOptions' => ['class' => 'in', 'data-widget'=>'collapse']
                            ]
                        ]
                    ]);
                }
            ],
        ],
    ]) ?>

</div>
