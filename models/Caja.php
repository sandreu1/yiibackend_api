<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property int $id
 * @property int $kg
 * @property int|null $palet
 * @property int $tipoCaja_id
 * @property int $sector_id
 * @property int|null $ordenDeCorte_id
 * @property int|null $variedaduva_id
 *
 * @property Ordendecorte $ordenDeCorte
 * @property Sector $sector
 * @property Tipocaja $tipoCaja
 * @property Variedaduva $variedaduva
 */
class Caja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kg', 'tipoCaja_id', 'sector_id'], 'required'],
            [['kg', 'palet', 'tipoCaja_id', 'sector_id', 'ordenDeCorte_id', 'variedaduva_id'], 'integer'],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
            [['tipoCaja_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipocaja::className(), 'targetAttribute' => ['tipoCaja_id' => 'id']],
            [['ordenDeCorte_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ordendecorte::className(), 'targetAttribute' => ['ordenDeCorte_id' => 'id']],
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
            'kg' => 'Kg',
            'palet' => 'Palet',
            'tipoCaja_id' => 'Tipo Caja Id',
            'sector_id' => 'Sector',
            'ordenDeCorte_id' => 'Orden de Corte',
            'variedaduva_id' => 'Variedad de uva',
        ];
    }

    /**
     * Gets query for [[OrdenDeCorte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenDeCorte()
    {
        return $this->hasOne(Ordendecorte::className(), ['id' => 'ordenDeCorte_id']);
    }

    /**
     * Gets query for [[Sector]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }

    /**
     * Gets query for [[TipoCaja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCaja()
    {
        return $this->hasOne(Tipocaja::className(), ['id' => 'tipoCaja_id']);
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
