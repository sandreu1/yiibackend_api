<?php
namespace app\controllers;
use app\models\Usuario;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class UserController extends ApiController
{
    public $modelClass = 'app\models\Usuario';
    public $authenable=false;
    public $authexcept=['authenticate']; //Acciones que No llevan autenticación 

  public function actionAuthenticate(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //if(count ($_POST) < 1) {
      // Si se envían los datos en formato raw dentro de la petición http, se recogen así:
      $params=json_decode(file_get_contents("php://input"), false);
      @$username=$params->usuario;
      @$password=$params->password;
      
      if($u=Usuario::findOne(['usuario'=>$username])) {
        if($u->contraseña==md5($password)) {//o crypt, según esté en la BD
          return ['token'=>$u->token,'id'=>$u->id,'nombre'=>$u->usuario, 'tipo' =>$u->tipo];
        }
      }
        else
      //return ['error'=>'Usuario o contraseña incorrecto. ' . json_encode($username)];
      throw new NotFoundHttpException ("Usuario o contraseña incorrecta");
    }
  }
}
  ?>