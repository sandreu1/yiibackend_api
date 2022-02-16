<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipocaja".
 *
 * @property int $id
 * @property string $tipo
 * @property string $descripcion
 * @property int $kg
 *
 * @property Caja[] $cajas
 */
class Tipocaja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipocaja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'descripcion', 'kg'], 'required'],
            [['descripcion'], 'string'],
            [['kg'], 'integer'],
            [['tipo'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripcion',
            'kg' => 'Kg',
        ];
    }

    /**
     * Gets query for [[Cajas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCajas()
    {
        return $this->hasMany(Caja::className(), ['tipoCaja_id' => 'id']);
    }

    public static $tipoOptions = ['P' => 'Producción', 'A' => 'Almacén'];

    public function getTipoText(){
        return self::$tipoOptions[$this->tipo] ?? '';
    }
}
