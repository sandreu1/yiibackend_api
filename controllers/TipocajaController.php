<?php

namespace app\controllers;
use yii\rest\ActiveController;

use app\models\Tipocaja;
use app\models\TipocajaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TipocajaController extends ActiveController
{
    public $modelClass = 'app\models\Tipocaja';
}