<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lineaorden".
 *
 * @property int $id
 * @property int $kg
 * @property int $ordendecorte_id
 * @property int $lineadepedido_id
 *
 * @property Lineadepedido $lineadepedido
 * @property Ordendecorte $ordendecorte
 */
class Lineaorden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lineaorden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kg', 'ordendecorte_id', 'lineadepedido_id'], 'required'],
            [['kg', 'ordendecorte_id', 'lineadepedido_id'], 'integer'],
            [['ordendecorte_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ordendecorte::className(), 'targetAttribute' => ['ordendecorte_id' => 'id']],
            [['lineadepedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lineadepedido::className(), 'targetAttribute' => ['lineadepedido_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kg' => 'Kg',
            'ordendecorte_id' => 'Ordendecorte ID',
            'lineadepedido_id' => 'Lineadepedido ID',
        ];
    }

    /**
     * Gets query for [[Lineadepedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLineadepedido()
    {
        return $this->hasOne(Lineadepedido::className(), ['id' => 'lineadepedido_id']);
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
}
