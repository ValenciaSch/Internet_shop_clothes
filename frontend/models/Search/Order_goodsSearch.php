<?php

namespace frontend\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Order_goods;

/**
 * Order_goodsSearch represents the model behind the search form about `frontend\models\Order_goods`.
 */
class Order_goodsSearch extends Order_goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_order', 'id_goods', 'quantity'], 'integer'],
            [['color', 'size', 'date'], 'safe'],
            [['price', 'sum'], 'number'],
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
        $query = Order_goods::find();

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
            'id_order' => $this->id_order,
            'id_goods' => $this->id_goods,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sum' => $this->sum,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'size', $this->size]);

        return $dataProvider;
    }
}
