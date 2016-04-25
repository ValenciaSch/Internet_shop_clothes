<?php

namespace frontend\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Order;

/**
 * OrderSearch represents the model behind the search form about `frontend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_delivery', 'id_payment'], 'integer'],
            [['address_delivery', 'comments', 'date'], 'safe'],
            [['total_sum'], 'number'],
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
        $query = Order::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_delivery' => $this->id_delivery,
            'id_payment' => $this->id_payment,
            'total_sum' => $this->total_sum,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'address_delivery', $this->address_delivery])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
