<?php

namespace app\models;

use Yii;

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
 * @property int $modifedDate Modified Date
 *
 * @property Attachment[] $attachments
 * @property User $createdBy0
 * @property User $modifiedBy0
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
            [['tenantID', 'createdBy', 'createdDate'], 'required'],
            [['tenantID', 'createdBy', 'createdDate', 'modifiedBy', 'modifedDate'], 'integer'],
            [['historyStartDate', 'historyEndDate'], 'safe'],
            [['historyStatus', 'historyDetail'], 'string'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'userID']],
            [['modifiedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modifiedBy' => 'userID']],
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
            'modifedDate' => 'Modified Date',
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
     * @inheritdoc
     * @return HistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HistoryQuery(get_called_class());
    }
}
