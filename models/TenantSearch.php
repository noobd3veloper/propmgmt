<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tenant;

/**
 * TenantSearch represents the model behind the search form of `app\models\Tenant`.
 */
class TenantSearch extends Tenant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenantID', 'createdBy', 'modifiedBy'], 'integer'],
            [['tenantSurname', 'tenantGivenName', 'tenantMiddleName', 'tenantBirthdate', 'tenantSSN', 'createdDate', 'modifiedDate'], 'safe'],
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
        $query = Tenant::find();

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
            'tenantID' => $this->tenantID,
            'tenantBirthdate' => $this->tenantBirthdate,
            'createdBy' => $this->createdBy,
            'createdDate' => $this->createdDate,
            'modifiedBy' => $this->modifiedBy,
            'modifiedDate' => $this->modifiedDate,
        ]);

        $query->andFilterWhere(['like', 'tenantSurname', $this->tenantSurname])
            ->andFilterWhere(['like', 'tenantGivenName', $this->tenantGivenName])
            ->andFilterWhere(['like', 'tenantMiddleName', $this->tenantMiddleName])
            ->andFilterWhere(['like', 'tenantSSN', $this->tenantSSN]);

        return $dataProvider;
    }
}
