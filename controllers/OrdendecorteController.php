<?php

namespace app\controllers;
use yii\rest\ActiveController;

use app\models\Ordendecorte;
use app\models\OrdendecorteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdendecorteController implements the CRUD actions for Ordendecorte model.
 */
class OrdendecorteController extends ActiveController
{
    public $modelClass = 'app\models\Ordendecorte';
}