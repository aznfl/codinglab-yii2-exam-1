<?php

namespace siswa\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Wali;

/**
 * WaliSearch represents the model behind the search form about `common\models\Wali`.
 */
class WaliSearch extends Wali
{
    public $status_wali;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_status_wali'], 'integer'],
            [['nama', 'alamat', 'no_hp', 'status_wali'], 'safe'],
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
        $query = Wali::find();

        $query->joinWith('refStatusWali');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['status_wali', 'nama', 'alamat', 'no_hp']],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'wali.id' => $this->id,
            'id_status_wali' => $this->id_status_wali,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'LOWER(status_wali)', strtolower($this->status_wali)]);

        return $dataProvider;
    }
}
