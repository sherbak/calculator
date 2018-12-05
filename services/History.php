<?php

namespace app\services;

use app\models\History as ModelHistory;

class History
{
    protected $calculator;
    protected $models;


    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
        $this->init();
    }

    protected function init(): void
    {
        foreach ($this->getModels() as $model) {
            $this->makeButton($model);
        }
    }

    public function hasModels(): bool
    {
        return isset($this->models) && count($this->models) > 0;
    }

    public function getModels(): array
    {
        if (!$this->models) {
            $this->models = ModelHistory::find()->all();
        }

        return $this->models;
    }

    public function makeButton(ModelHistory $model): void
    {
        $this->calculator->setButton(new HistoryButton($this->calculator, $model->equation, $model));
    }

    public function add(string $equation): void
    {
        $model = new ModelHistory();
        $model->equation = $equation;
        $model->save();

        $this->makeButton($model);
        $this->models[] = $model;
    }
}
