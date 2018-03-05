<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'roleID', 'duration', 'createdBy', 'createdDate'], 'integer'],
            [['username', 'userPassword', 'userAuthKey', 'userAccessToken', 'userEmail', 'userGivenName', 'userSurname', 'userResetToken', 'companyName', 'startdate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'userID' => $this->userID,
            'roleID' => $this->roleID,
            'startdate' => $this->startdate,
            'duration' => $this->duration,
            'createdBy' => $this->createdBy,
            'createdDate' => $this->createdDate,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'userPassword', $this->userPassword])
            ->andFilterWhere(['like', 'userAuthKey', $this->userAuthKey])
            ->andFilterWhere(['like', 'userAccessToken', $this->userAccessToken])
            ->andFilterWhere(['like', 'userEmail', $this->userEmail])
            ->andFilterWhere(['like', 'userGivenName', $this->userGivenName])
            ->andFilterWhere(['like', 'userSurname', $this->userSurname])
            ->andFilterWhere(['like', 'userResetToken', $this->userResetToken])
            ->andFilterWhere(['like', 'companyName', $this->companyName]);

        return $dataProvider;
    }
}
