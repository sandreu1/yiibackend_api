<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ordendecorte".
 *
 * @property int $id
 * @property string $lote
 * @property int $kgtotales
 * @property string $estado
 * @property string $fecha_alta
 * @property string $fecha_salida
 * @property int $finca_id
 * @property int $parcela_id
 * @property int $variedaduva_id
 *
 * @property Caja[] $cajas
 * @property Finca $finca
 * @property Lineadepedido[] $lineadepedidos
 * @property Lineaorden[] $lineaordens
 * @property Parcela $parcela
 * @property Variedaduva $variedaduva
 */
class Ordendecorte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordendecorte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lote', 'kgtotales', 'estado', 'fecha_alta', 'fecha_salida', 'finca_id', 'parcela_id', 'variedaduva_id'], 'required'],
            [['lote'], 'string'],
            [['kgtotales', 'finca_id', 'parcela_id', 'variedaduva_id'], 'integer'],
            [['fecha_alta', 'fecha_salida'], 'safe'],
            [['estado'], 'string', 'max' => 1],
            [['finca_id'], 'exist', 'skipOnError' => true, 'targetClass' => Finca::className(), 'targetAttribute' => ['finca_id' => 'id']],
            [['parcela_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parcela::className(), 'targetAttribute' => ['parcela_id' => 'id']],
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
            'lote' => 'Lote',
            'kgtotales' => 'Kg Totales',
            'estado' => 'Estado',
            'fecha_alta' => 'Fecha Alta',
            'fecha_salida' => 'Fecha Salida',
            'finca_id' => 'Finca',
            'parcela_id' => 'Parcela ID',
            'variedaduva_id' => 'Variedaduva',
        ];
    }

    /**
     * Gets query for [[Cajas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCajas()
    {
        return $this->hasMany(Caja::className(), ['ordenDeCorte_id' => 'id']);
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
     * Gets query for [[Lineadepedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLineadepedidos()
    {
        return $this->hasMany(Lineadepedido::className(), ['ordendecorte_id' => 'id']);
    }

    /**
     * Gets query for [[Lineaordens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLineaordens()
    {
        return $this->hasMany(Lineaorden::className(), ['ordendecorte_id' => 'id']);
    }

    /**
     * Gets query for [[Parcela]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcela()
    {
        return $this->hasOne(Parcela::className(), ['id' => 'parcela_id']);
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


    public static $estadoOptions = ['P' => 'Pendiente', 'A' => 'Almacén', 'C' => 'Campo'];

    public function getEstadoText(){
        return self::$estadoOptions[$this->estado] ?? '';
    }

    public static function lookup()
    {
        return ArrayHelper::map(self::find()->asArray()->all(),'id','lote');
    }

    public function fields() {
        $contenido = parent::fields();
        
        array_push($contenido,'finca','parcela','variedaduva');
        
        return $contenido;
    }
}
