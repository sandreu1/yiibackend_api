<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordendecorte;

/**
 * OrdendecorteSearch represents the model behind the search form of `app\models\Ordendecorte`.
 */
class OrdendecorteSearch extends Ordendecorte
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kgtotales', 'finca_id', 'parcela_id', 'variedaduva_id'], 'integer'],
            [['lote', 'estado', 'fecha_alta', 'fecha_salida'], 'safe'],
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
        $query = Ordendecorte::find();

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
            'kgtotales' => $this->kgtotales,
            'fecha_alta' => $this->fecha_alta,
            'fecha_salida' => $this->fecha_salida,
            'finca_id' => $this->finca_id,
            'parcela_id' => $this->parcela_id,
            'variedaduva_id' => $this->variedaduva_id,
        ]);

        $query->andFilterWhere(['like', 'lote', $this->lote])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
