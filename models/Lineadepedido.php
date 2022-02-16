<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lineadepedido".
 *
 * @property int $id
 * @property int $pedido_id
 * @property int $ordendecorte_id
 * @property int $kg
 * @property int $variedaduva_id
 *
 * @property Lineaorden[] $lineaordens
 * @property Ordendecorte $ordendecorte
 * @property Pedido $pedido
 * @property Variedaduva $variedaduva
 */
class Lineadepedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lineadepedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pedido_id', 'ordendecorte_id', 'kg', 'variedaduva_id'], 'required'],
            [['pedido_id', 'ordendecorte_id', 'kg', 'variedaduva_id'], 'integer'],
            [['pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['pedido_id' => 'id']],
            [['ordendecorte_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ordendecorte::className(), 'targetAttribute' => ['ordendecorte_id' => 'id']],
            [['variedaduva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variedaduva::className(), 'targetAttribute' => ['variedaduva_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pedido_id' => 'Pedido ID',
            'ordendecorte_id' => 'Ordendecorte ID',
            'kg' => 'Kg',
            'variedaduva_id' => 'Variedaduva ID',
        ];
    }

    /**
     * Gets query for [[Lineaordens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLineaordens()
    {
        return $this->hasMany(Lineaorden::className(), ['lineadepedido_id' => 'id']);
    }

    /**
     * Gets query for [[Ordendecorte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdendecorte()
    {
        return $this->hasOne(Ordendecorte::className(), ['id' => 'ordendecorte_id']);
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'pedido_id']);
    }

    /**
     * Gets query for [[Variedaduva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariedaduva()
    {
        return $this->hasOne(Variedaduva::className(), ['id' => 'variedaduva_id']);
    }
}
