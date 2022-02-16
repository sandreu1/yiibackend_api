<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "finca".
 *
 * @property int $id
 * @property string $localización
 *
 * @property Ordendecorte[] $ordendecortes
 * @property Parcela[] $parcelas
 * @property Usuario[] $usuarios
 */
class Finca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['localización'], 'required'],
            [['localización'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'localización' => 'Localización',
        ];
    }

    /**
     * Gets query for [[Ordendecortes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdendecortes()
    {
        return $this->hasMany(Ordendecorte::className(), ['finca_id' => 'id']);
    }

    /**
     * Gets query for [[Parcelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcelas()
    {
        return $this->hasMany(Parcela::className(), ['finca_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['finca_id' => 'id']);
    }

    public static function lookup()
    {
        return ArrayHelper::map(self::find()->asArray()->all(),'id','localización');
    }
}
