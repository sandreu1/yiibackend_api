<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "variedaduva".
 *
 * @property int $id
 * @property string $tipo
 * @property string $duracion
 *
 * @property Caja[] $cajas
 * @property Lineadepedido[] $lineadepedidos
 * @property Ordendecorte[] $ordendecortes
 * @property Parcela[] $parcelas
 */
class Variedaduva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variedaduva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'duracion'], 'required'],
            [['tipo', 'duracion'], 'string', 'max' => 30],
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
            'duracion' => 'Duracion',
        ];
    }

    /**
     * Gets query for [[Cajas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCajas()
    {
        return $this->hasMany(Caja::className(), ['variedaduva_id' => 'id']);
    }

    /**
     * Gets query for [[Lineadepedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLineadepedidos()
    {
        return $this->hasMany(Lineadepedido::className(), ['variedaduva_id' => 'id']);
    }

    /**
     * Gets query for [[Ordendecortes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdendecortes()
    {
        return $this->hasMany(Ordendecorte::className(), ['variedaduva_id' => 'id']);
    }

    /**
     * Gets query for [[Parcelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcelas()
    {
        return $this->hasMany(Parcela::className(), ['variedadUva_id' => 'id']);
    }

    public static $variedadId = [1 => 'Blanca', 2 => 'Negra', 3 => 'Roja'];

    public static $tipoOptions = ['B'=>'Blanca','N'=>'Negra', 'R' => 'Roja'];

    public function getTipoText(){
        return self::$tipoOptions[$this->tipo] ?? '';
   }

   public static function lookup()
   {
       return ArrayHelper::map(self::find()->asArray()->all(),'id','tipo');
   }


}
