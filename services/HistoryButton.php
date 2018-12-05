<?php

namespace app\services;

use app\models\History as ModelHistory;
use yii\helpers\Html;

class HistoryButton extends Button
{
    protected $model;


    public function __construct(Calculator $calculator, string $title, ModelHistory $model)
    {
        parent::__construct($calculator, $title);

        $this->model = $model;
    }

    public function code(): string
    {
        return 'history-' . $this->model->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function click(): void
    {
        $this->calculator->setEquation($this->model->equation);
    }
}
