<?php

namespace app\models;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use app\models\User;
use kartik\password\StrengthValidator;


class ChangePasswordForm extends Model
{
    public $id;
    public $password;
    public $confirm_password;

    private $_user;

 
    public function __construct($id, $config = [])
    {
        $this->_user = User::findIdentity($id);
        
        if (!$this->_user) {
            throw new InvalidParamException('Unable to find user!');
        }
        
        $this->id = $this->_user->id;
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password','confirm_password'], 'required'],
            [['password','confirm_password'], StrengthValidator::className(), 'min'=>8, 'digit'=>1, 'special'=>1, 'upper' => 1,'lower' => 1,],
            ['confirm_password', 'compare', 'compareAttribute' => 'password'],
        ];
    }
 
    /**
     * Changes password.
     *
     * @return boolean if password was changed.
     */
    public function changePassword()
    {
        $user = $this->_user;
        $user->userPassword = $user->hashPassword($this->password);
 
        return $user->save(false);
    }
}
?>