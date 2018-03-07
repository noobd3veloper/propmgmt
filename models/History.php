<?php

namespace app\models;

use Yii;
use app\controllers\AttachmentController;
use yii\helpers\Html;
/**
 * This is the model class for table "history".
 *
 * @property string $historyID ID
 * @property string $tenantID Tenant ID
 * @property string $historyStartDate Start Date
 * @property string $historyEndDate End Date
 * @property string $historyStatus Status
 * @property string $historyDetail Details
 * @property int $createdBy Created By
 * @property int $createdDate Created Date
 * @property int $modifiedBy Modified By
 * @property int $modifiedDate Modified Date
 *
 * @property Attachment[] $attachments
 * @property User $createdBy0
 * @property User $modifiedBy0
 * @property Tenant $tenant
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenantID'], 'required'],
            [['tenantID', 'createdBy', 'createdDate', 'modifiedBy', 'modifiedDate'], 'integer'],
            [['historyStartDate', 'historyEndDate'], 'safe'],
            [['historyStatus', 'historyDetail'], 'string'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'userID']],
            [['modifiedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modifiedBy' => 'userID']],
            [['tenantID'], 'exist', 'skipOnError' => true, 'targetClass' => Tenant::className(), 'targetAttribute' => ['tenantID' => 'tenantID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'historyID' => 'ID',
            'tenantID' => 'Tenant ID',
            'historyStartDate' => 'Start Date',
            'historyEndDate' => 'End Date',
            'historyStatus' => 'Status',
            'historyDetail' => 'Details',
            'createdBy' => 'Created By',
            'createdDate' => 'Created Date',
            'modifiedBy' => 'Modified By',
            'modifiedDate' => 'Modified Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachments()
    {
        return $this->hasMany(Attachment::className(), ['historyID' => 'historyID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['userID' => 'createdBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy0()
    {
        return $this->hasOne(User::className(), ['userID' => 'modifiedBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenant()
    {
        return $this->hasOne(Tenant::className(), ['tenantID' => 'tenantID']);
    }

    /**
     * @inheritdoc
     * @return HistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HistoryQuery(get_called_class());
    }

    public function getAttachmentDetail()
    {
        $value = "";
        // foreach($this->attachments as $attachmentDetail) {
        //      //$class = $historyDetail->historyStatus == 'GOOD' ? 'success' : 'danger';
        //      $value .= '<tr id="'. $attachmentDetail->historyID .'" class="">
        //                     <td> <img src="data:image/jpeg;base64,\'.base64_encode('.$attachmentDetail->attachmentFile . ').\'" /> </td>
        //                     <td>' .  $attachmentDetail->attachmentFile .' </td> 
        //                 </tr>';
         
        // }
//        AttachmentController::displayImages($this->historyID);
        foreach(AttachmentController::displayImages($this->historyID) as $attachmentDetail) {
            //$class = $historyDetail->historyStatus == 'GOOD' ? 'success' : 'danger';
            $value .= '<tr id="'. $attachmentDetail['historyID'] .'" class="">
                           <td>' . $attachmentDetail['attachmentName'] . '</td>
                           <td> ' .  Html::img("data:image/jpeg;base64," . base64_encode($attachmentDetail['attachmentFile']), 
                                                ["id"=>$attachmentDetail['attachmentID'], 
                                                "class"=>"custom-thumbnail", 
                                                "data-target"=>"#modal-default",
                                                "data-toggle"=>"modal",
                                                "name"=>$attachmentDetail['attachmentName'] ]) .
                          '</td> 
                           <td> '; 
                            if (Yii::$app->user->getIdentity()->id == $attachmentDetail['createdBy']) {
                                $value .= Html::a(
                                    '<span class="glyphicon glyphicon-pencil"/></a>',
                                    ['/attachment/update', 'id' =>$attachmentDetail['attachmentID'] ]
                                );
                                $value .= Html::a(
                                    '<span class="glyphicon glyphicon-trash"/></a>',
                                    ['/attachment/delete', 'id' =>$attachmentDetail['attachmentID'] ]
                                );
                            }
            $value .='</td>
                       </tr>';
        
       }
        return $value;
    }
}
