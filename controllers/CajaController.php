<?php

namespace app\controllers;
use yii\rest\ActiveController;

use app\models\Caja;
use app\models\CajaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CajaController extends ActiveController
{
    public $modelClass = 'app\models\Caja';
}
