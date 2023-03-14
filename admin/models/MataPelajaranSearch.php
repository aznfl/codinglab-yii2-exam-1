<?php

namespace admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MataPelajaran;

/**
 * MataPelajaranSearch represents the model behind the search form about `common\models\MataPelajaran`.
 */
class MataPelajaranSearch extends MataPelajaran
{
    public $jurusan;
    public $tingkat_kelas;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tingkat_kelas', 'id_jurusan'], 'integer'],
            [['mata_pelajaran', 'jurusan', 'tingkat_kelas'], 'safe'],
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
        $query = MataPelajaran::find();

        $query->joinWith('jurusan');
        $query->joinWith('tingkatKelas');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['jurusan', 'tingkat_kelas', 'id_jurusan', 'mata_pelajaran']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_tingkat_kelas' => $this->id_tingkat_kelas,
            'id_jurusan' => $this->id_jurusan,
        ]);

        $query  ->andFilterWhere(['like', 'LOWER(mata_pelajaran)', strtolower($this->mata_pelajaran)])
                ->andFilterWhere(['like', 'LOWER(jurusan)', strtolower($this->jurusan)]);
                // ->andFilterWhere(['like', 'LOWER(tingkat_kelas)', strtolower($this->tingkat_kelas)]);

        return $dataProvider;
    }
}
