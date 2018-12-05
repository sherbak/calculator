<?php

namespace app\services;

class OperandButton extends Button
{
    protected $symbol;


    public function __construct(Calculator $calculator, string $title, string $symbol)
    {
        parent::__construct($calculator, $title);

        $this->symbol = $symbol;
    }

    public function code(): string
    {
        return 'operand-' . $this->symbol;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function click(): void
    {
        $equation = $this->calculator->getEquation() . $this->symbol;
        $this->calculator->setEquation($equation);
    }
}
