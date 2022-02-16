<?php 
namespace app\controllers;
 
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\Cors;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
 
class ApiController extends \yii\rest\ActiveController {
       public $enableCsrfValidation= false; 
       public $authenable=true;
       public $authexcept=[]; //Acciones que No llevan autenticación 
 
       public function beforeAction($a){
                header('Access-Control-Allow-Origin: *');
                return parent::beforeAction($a);
       }

       public static function allowedDomains() {
               return [
                       'http://localhost:4200/',
                       'http://alum2.iesfsl.org/',
               ];
       }
 
       public function behaviors() {
                $behaviors = parent::behaviors();
                unset($behaviors['authenticator']);
                $behaviors['corsFilter'] = [
                        'class' => Cors::className(),
                        'cors' => [
                                'Origin' => static::allowedDomains(),
                                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                                'Access-Control-Request-Headers' => ['*'],
                                'Access-Control-Allow-Credentials' => false,
                               'Access-Control-Max-Age' => 86400
                        ],
                ];
 
                if (!$this->authenable)
                        return $behaviors;
                $behaviors['authenticator'] = [
                        'class' => HttpBearerAuth::className(),
                        'except' => array_merge(['options','authenticate'],$this->authexcept),
                ];
 
                return $behaviors;
        }
}