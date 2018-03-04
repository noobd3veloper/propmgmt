<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tenant".
 *
 * @property string $tenantID ID
 * @property string $tenantSurname Surname
 * @property string $tenantGivenName Given Name
 * @property string $tenantMiddleName MiddleName
 * @property string $tenantBirthdate Date of Birth
 * @property string $tenantSSN Social Security Number
 * @property int $createdBy Ccreated By
 * @property string $createdDate Create Date
 * @property int $modifiedBy Modified By
 * @property string $modifiedDate Modified Date
 */
class Tenant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tenant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenantSurname', 'tenantGivenName', 'tenantBirthdate', 'tenantSSN', 'createdBy', 'createdDate'], 'required'],
            [['tenantBirthdate', 'createdDate', 'modifiedDate'], 'safe'],
            [['createdBy', 'modifiedBy'], 'integer'],
            [['tenantSurname', 'tenantGivenName', 'tenantMiddleName'], 'string', 'max' => 255],
            [['tenantSSN'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tenantID' => 'ID',
            'tenantSurname' => 'Surname',
            'tenantGivenName' => 'Given Name',
            'tenantMiddleName' => 'MiddleName',
            'tenantBirthdate' => 'Date of Birth',
            'tenantSSN' => 'Social Security Number',
            'createdBy' => 'Ccreated By',
            'createdDate' => 'Create Date',
            'modifiedBy' => 'Modified By',
            'modifiedDate' => 'Modified Date',
        ];
    }

    /**
     * @inheritdoc
     * @return TenantQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TenantQuery(get_called_class());
    }
}
