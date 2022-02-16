<?php

namespace app\controllers;
use yii\rest\ActiveController;

use app\models\Variedaduva;
use app\models\VariedaduvaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class VariedaduvaController extends ActiveController
{
    public $modelClass = 'app\models\Variedaduva';
}