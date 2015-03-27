<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InfoTest;

/**
 * ProfileSearch represents the model behind the search form about `common\models\Profile`.
 */
class InfoSearch extends InfoTest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by'], 'integer'],
            [['first_name', 'last_name', 'phone', 'date_birth'], 'safe'],
            //[['languages'], 'safe'],
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
        $query = InfoTest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => Yii::$app->user->getId(),
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'phone' => $this->phone,
            'date_birth' => $this->date_birth,
            
        ]);

        //$query->andFilterWhere(['like', 'languages', $this->languages]);

        return $dataProvider;
    }
}
