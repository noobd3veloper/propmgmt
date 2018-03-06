<?php

namespace app\models;

use Yii;
use app\models\History;
use yii\helpers\Html;
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
            [['tenantSurname', 'tenantGivenName', 'tenantBirthdate', 'tenantSSN',], 'required'],
            [['tenantBirthdate'], 'safe'],
            [['createdBy', 'modifiedBy', 'createdDate', 'modifiedDate'], 'integer'],
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
            'tenantMiddleName' => 'Middle Name',
            'tenantBirthdate' => 'Date of Birth',
            'tenantSSN' => 'Social Security Number',
            'createdBy' => 'Created By',
            'createdDate' => 'Created Date',
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

    /**
	 * @return Full name of the Tenant
	 */
	public function getFullName()
	{
        $fullname = $this->tenantGivenName; 
        if ($this->tenantMiddleName != null){
            if($this->tenantMiddleName != '') { 
                $fullname .= ' '.$this->tenantMiddleName;    
            } 
        }
		if($this->tenantSurname != '') { 
			$fullname .= ' '.$this->tenantSurname;    
		} 
		return $fullname; 
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
    public function getHistory()
    {
        return $this->hasMany(History::className(), ['tenantID' => 'tenantID']);
    }

    public function getHistoryDetail()
    {
        $value = "";
        foreach($this->history as $historyDetail) {
             $class = $historyDetail->historyStatus == 'GOOD' ? 'success' : 'danger';
             $value .= '<tr id="'. $historyDetail->historyID .'" class='.$class.'><td>'. $historyDetail->historyStartDate. '</td><td>' .  $historyDetail->historyEndDate .' </td> 
                <td>' .  $historyDetail->historyStatus .' </td><td> ' . 
                    Html::a(
                        '<span class="glyphicon glyphicon-eye-open"/>',
                        ['/history/view', 'id' =>$historyDetail->historyID ]
                    )
                    . 
                    Html::a(
                        '<span class="glyphicon glyphicon-pencil"/></a>',
                        ['/history/update', 'id' =>$historyDetail->historyID ]
                    )
                    . '</td>
                </tr>';
         
        }
        return $value;
    }
}
