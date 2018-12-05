<?php

namespace app\controllers;

use app\services\CalculateButton;
use app\services\Calculator;
use app\services\ClearButton;
use app\services\History;
use app\services\OperandButton;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $calculator = $this->buildCalculator();

        if ($code = Yii::$app->request->get('code')) {
            $calculator->getButton($code)->click();
        }

        return $this->render('index', [
            'calculator' => $calculator,
        ]);
    }

    /**
     * Calculator builder
     *
     * @return Calculator
     */
    private function buildCalculator()
    {
        $calculator = new Calculator();
        $calculator->setButton(new OperandButton($calculator, '1', '1'));
        $calculator->setButton(new OperandButton($calculator, '2', '2'));
        $calculator->setButton(new OperandButton($calculator, '3', '3'));
        $calculator->setButton(new OperandButton($calculator, '4', '4'));
        $calculator->setButton(new OperandButton($calculator, '5', '5'));
        $calculator->setButton(new OperandButton($calculator, '6', '6'));
        $calculator->setButton(new OperandButton($calculator, '7', '7'));
        $calculator->setButton(new OperandButton($calculator, '8', '8'));
        $calculator->setButton(new OperandButton($calculator, '9', '9'));
        $calculator->setButton(new OperandButton($calculator, '0', '0'));
        $calculator->setButton(new OperandButton($calculator, '.', '.'));
        $calculator->setButton(new OperandButton($calculator, '(', '('));
        $calculator->setButton(new OperandButton($calculator, ')', ')'));
        $calculator->setButton(new OperandButton($calculator, '/', '/'));
        $calculator->setButton(new OperandButton($calculator, '*', '*'));
        $calculator->setButton(new OperandButton($calculator, '-', '-'));
        $calculator->setButton(new OperandButton($calculator, '+', '+'));

        $calculator->setButton(new ClearButton($calculator, 'C'));
        $calculator->setButton(new CalculateButton($calculator, '='));

        $calculator->setHistory(new History($calculator));

        return $calculator;
    }
}
