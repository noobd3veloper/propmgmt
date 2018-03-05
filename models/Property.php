<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property string $propertyID ID
 * @property string $propertyName Name
 * @property string $propertyLocation Location
 * @property int $createdBy Added By
 * @property int $createDate Create Date
 * @property int $modifiedBy Editted By
 * @property int $modifiedDate Modified Date
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyName', 'propertyLocation', 'createdBy', 'createDate'], 'required'],
            [['createdBy', 'createDate', 'modifiedBy', 'modifiedDate'], 'integer'],
            [['propertyName', 'propertyLocation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'propertyID' => 'ID',
            'propertyName' => 'Name',
            'propertyLocation' => 'Location',
            'createdBy' => 'Added By',
            'createDate' => 'Create Date',
            'modifiedBy' => 'Editted By',
            'modifiedDate' => 'Modified Date',
        ];
    }

    /**
     * @inheritdoc
     * @return PropertyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PropertyQuery(get_called_class());
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
}
