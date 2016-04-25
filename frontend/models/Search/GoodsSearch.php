<?php

namespace frontend\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `frontend\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_brands', 'id_category1', 'id_category2', 'id_category3', 'visible', 'hits', 'new1', 'sale'], 'integer'],
            [['name', 'img', 'id_color', 'img_clothers', 'id_size', 'short_description', 'full_description', 'date', 'img_slide'], 'safe'],
            [['price'], 'number'],
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
        $query = Goods::find();

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
            'id_brands' => $this->id_brands,
            'id_category1' => $this->id_category1,
            'id_category2' => $this->id_category2,
            'id_category3' => $this->id_category3,
            'visible' => $this->visible,
            'hits' => $this->hits,
            'new1' => $this->new1,
            'sale' => $this->sale,
            'price' => $this->price,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'id_color', $this->id_color])
            ->andFilterWhere(['like', 'img_clothers', $this->img_clothers])
            ->andFilterWhere(['like', 'id_size', $this->id_size])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'full_description', $this->full_description])
            ->andFilterWhere(['like', 'img_slide', $this->img_slide]);

        return $dataProvider;
    }
}
