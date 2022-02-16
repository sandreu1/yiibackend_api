<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $tipo
 * @property string $usuario
 * @property string $contraseña
 * @property string $nombre
 * @property string $correo
 * @property int|null $finca_id
 *
 * @property Finca $finca
 */

class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    public static function findByUsername($username) {
       return static::findOne(['usuario' => $username]);
    }
     
    public static function findIdentity($id) {
        return static::findOne($id);
    }
     
    public function getId() {
        return $this->id;
    }
     
    public function getAuthKey() { }
     
    public function validateAuthKey($authKey) { }

    // Comprueba que el password que se le pasa es correcto
    function validatePassword($password) {
        return md5($this->contraseña) === md5($password); // Si se utiliza otra función de encriptación distinta a md5, habrá que cambiar esta línea
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'usuario', 'contraseña', 'nombre', 'correo'], 'required'],
            [['finca_id'], 'integer'],
            [['tipo'], 'string', 'max' => 1],
            [['usuario', 'nombre', 'correo'], 'string', 'max' => 30],
            [['contraseña'], 'string', 'max' => 32],
            [['finca_id'], 'exist', 'skipOnError' => true, 'targetClass' => Finca::className(), 'targetAttribute' => ['finca_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipotext' => 'Tipo',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'nombre' => 'Nombre',
            'correo' => 'Correo',
            'finca_id' => 'Finca',
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

    public static $tipoOptions = ['C'=>'Campo','E'=>'Entrada','P'=>'Producción','S'=>'Salida','A' => 'Administrador'];

    public function getTipoText(){
        return self::$tipoOptions[$this->tipo] ?? '';
   }

   public static function findIdentityByAccessToken($token, $type = null) {
    return self::findOne(['token' => $token]);
    }
}
