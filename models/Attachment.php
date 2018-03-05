<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attachment".
 *
 * @property string $attachmentID ID
 * @property string $historyID History ID
 * @property string $attachmentName Filename
 * @property resource $attachmentFile Attachment File
 * @property int $createdBy Created By
 * @property int $createdDate Created Date
 * @property int $modifiedBy Modified Date
 * @property int $modifiedDate Modified Date
 *
 * @property User $createdBy0
 * @property History $history
 * @property User $modifiedBy0
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['historyID', 'attachmentName', 'attachmentFile', 'createdBy', 'createdDate'], 'required'],
            [['historyID', 'createdBy', 'createdDate', 'modifiedBy', 'modifiedDate'], 'integer'],
            [['attachmentFile'], 'string'],
            [['attachmentName'], 'string', 'max' => 255],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'userID']],
            [['historyID'], 'exist', 'skipOnError' => true, 'targetClass' => History::className(), 'targetAttribute' => ['historyID' => 'historyID']],
            [['modifiedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modifiedBy' => 'userID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attachmentID' => 'ID',
            'historyID' => 'History ID',
            'attachmentName' => 'Filename',
            'attachmentFile' => 'Attachment File',
            'createdBy' => 'Created By',
            'createdDate' => 'Created Date',
            'modifiedBy' => 'Modified Date',
            'modifiedDate' => 'Modified Date',
        ];
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
    public function getHistory()
    {
        return $this->hasOne(History::className(), ['historyID' => 'historyID']);
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
     * @return AttachmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttachmentQuery(get_called_class());
    }
}
