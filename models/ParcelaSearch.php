<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parcela;

/**
 * ParcelaSearch represents the model behind the search form of `app\models\Parcela`.
 */
class ParcelaSearch extends Parcela
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kgEstimados', 'kgDisponibles', 'finca_id', 'variedadUva_id'], 'integer'],
            [['gradoMaduracion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Parcela::find();

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
            'id' => $this->id,
            'kgEstimados' => $this->kgEstimados,
            'kgDisponibles' => $this->kgDisponibles,
            'finca_id' => $this->finca_id,
            'variedadUva_id' => $this->variedadUva_id,
        ]);

        $query->andFilterWhere(['like', 'gradoMaduracion', $this->gradoMaduracion]);

        return $dataProvider;
    }
}
