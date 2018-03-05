<?php

namespace app\models;

use Yii;
use app\vendor\bcrypt;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property int $userID ID
 * @property string $username User Name
 * @property string $userPassword Password
 * @property string $userAuthKey Authorization Key
 * @property string $userAccessToken Access Token
 * @property string $userEmail E-mail
 * @property string $userGivenName Given Name
 * @property string $userSurname Surname
 * @property int $createdBy
 * @property int $createdDate
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'userPassword', 'userEmail', 'userGivenName', 'userSurname', 'createdBy', 'createdDate'], 'required'],
            [['createdBy', 'createdDate'], 'integer'],
            [['username', 'userPassword', 'userAuthKey', 'userAccessToken', 'userEmail', 'userGivenName', 'userSurname','userResetToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userID' => 'ID',
            'username' => 'User Name',
            'userPassword' => 'Password',
            'userAuthKey' => 'Authorization Key',
            'userAccessToken' => 'Access Token',
            'userEmail' => 'E-mail',
            'userGivenName' => 'Given Name',
            'userSurname' => 'Surname',
            'userResetToken' => 'Reset Token',
            'createdBy' => 'Created By',
            'createdDate' => 'Created Date',
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = NULL)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getAuthKey()
    {
        return $this->userAuthKey;
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getFullName()
	{
		$fullname = $this->userGivenName; 
		if($this->userSurname != '') { 
			$fullname .= ' '.$this->userSurname;    
		} 
		return $fullname; 
    } 
    
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function removePasswordResetToken()
    {
        $this->userResetToken = null;
    }

    public function validatePassword($password)
    {
        return bCrypt::verify($password, $this->userPassword);
    }

    public function hashPassword($password)
	{
        $enc = NEW bCrypt();
        return $enc->hash($password);
		//return Yii::$app->getSecurity()->generatePasswordHash($password);
    }
    
    public function generatePasswordResetToken()
    {
        $this->userResetToken = Security::generateRandomKey() . '_' . time();
    }

    public function setPassword($password)
    {
        $this->password_hash = $password;//Security::generatePasswordHash($password);
    }
}
