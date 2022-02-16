<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "parcela".
 *
 * @property int $id
 * @property int $kgEstimados
 * @property int $kgDisponibles
 * @property string $gradoMaduracion
 * @property int $finca_id
 * @property int $variedadUva_id
 *
 * @property Finca $finca
 * @property Ordendecorte[] $ordendecortes
 * @property Variedaduva $variedadUva
 */
class Parcela extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parcela';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kgEstimados', 'kgDisponibles', 'gradoMaduracion', 'finca_id', 'variedadUva_id'], 'required'],
            [['kgEstimados', 'kgDisponibles', 'finca_id', 'variedadUva_id'], 'integer'],
            [['gradoMaduracion'], 'string', 'max' => 1],
            [['finca_id'], 'exist', 'skipOnError' => true, 'targetClass' => Finca::className(), 'targetAttribute' => ['finca_id' => 'id']],
            [['variedadUva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variedaduva::className(), 'targetAttribute' => ['variedadUva_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kgEstimados' => 'Kg Estimados',
            'kgDisponibles' => 'Kg Disponibles',
            'gradoMaduracion' => 'Grado Maduracion',
            'finca_id' => 'Finca',
            'variedadUva_id' => 'Variedad Uva',
        ];
    }

    /**
     * Gets query for [[Finca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFinca()
    {
        return $this->hasOne(Finca::className(), ['id' => 'finca_id']);
    }

    /**
     * Gets query for [[Ordendecortes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdendecortes()
    {
        return $this->hasMany(Ordendecorte::className(), ['parcela_id' => 'id']);
    }

    /**
     * Gets query for [[VariedadUva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariedadUva()
    {
        return $this->hasOne(Variedaduva::className(), ['id' => 'variedadUva_id']);
    }

    public static $gradoOptions = ['A' => 'Apto', 'N' => 'No apto'];

    public function getGradoText(){
        return self::$gradoOptions[$this->gradoMaduracion] ?? '';
    }

    public static function lookup() {
        return ArrayHelper::map(self::find()->asArray()->all(),'id', 'id');
    }
}
