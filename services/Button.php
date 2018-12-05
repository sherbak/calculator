<?php

namespace app\services;

use yii\helpers\Html;

abstract class Button
{
    /**
     * @var Calculator
     */
    protected $calculator;
    protected $title;


    public function __construct(Calculator $calculator, string $title)
    {
        $this->calculator = $calculator;
        $this->title = $title;
    }

    abstract public function title(): string;

    abstract public function code(): string;

    abstract public function click(): void;

    public function render(array $options = [])
    {
        return Html::a(
            $this->title(),
            ['site/index', 'code' => $this->code()],
            $options
        );
    }
}
