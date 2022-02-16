<?php

namespace app\controllers;
use yii\rest\ActiveController;

use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UsuarioController extends ActiveController
{
    public $modelClass = 'app\models\Usuario';
}