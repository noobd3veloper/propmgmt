<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\History;

/**
 * HistorySearch represents the model behind the search form of `app\models\History`.
 */
class HistorySearch extends History
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['historyID', 'tenantID', 'createdBy', 'createdDate', 'modifiedBy', 'modifedDate'], 'integer'],
            [['historyStartDate', 'historyEndDate', 'historyStatus', 'historyDetail'], 'safe'],
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
        $query = History::find();

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
            'historyID' => $this->historyID,
            'tenantID' => $this->tenantID,
            'historyStartDate' => $this->historyStartDate,
            'historyEndDate' => $this->historyEndDate,
            'createdBy' => $this->createdBy,
            'createdDate' => $this->createdDate,
            'modifiedBy' => $this->modifiedBy,
            'modifedDate' => $this->modifedDate,
        ]);

        $query->andFilterWhere(['like', 'historyStatus', $this->historyStatus])
            ->andFilterWhere(['like', 'historyDetail', $this->historyDetail]);

        return $dataProvider;
    }
}
