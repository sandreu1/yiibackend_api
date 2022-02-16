<?php
return  [
['class' => 'yii\rest\UrlRule',
    'pluralize'=>false,
    'controller' => [
        'caja',
        'finca',
        'ordendecorte',
        'parcela',
        'sector',
        'tipocaja',
        'usuario',
        'variedaduva',

    ],
],
['class' => 'yii\rest\UrlRule',
    'controller' => ['user'],
    'pluralize'=>false,
    'extraPatterns'=>['POST authenticate'=>'authenticate',
            'OPTIONS authenticate'=>'authenticate',
            ]
],
 
];