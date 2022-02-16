<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sector".
 *
 * @property int $id
 * @property string $nombre
 * @property string $tipo
 *
 * @property Caja[] $cajas
 */
class Sector extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sector';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo'], 'required'],
            [['nombre', 'tipo'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[Cajas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCajas()
    {
        return $this->hasMany(Caja::className(), ['sector_id' => 'id']);
    }

    public static $tipoOptions = ['A'=>'Almacén','P'=>'Producción'];

    public function getTipoText(){
        return self::$tipoOptions[$this->tipo] ?? '';
   }


}
