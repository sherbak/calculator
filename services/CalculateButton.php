<?php

namespace app\services;

class CalculateButton extends Button
{
    public function __construct(Calculator $calculator, string $title)
    {
        parent::__construct($calculator, $title);
    }

    public function code(): string
    {
        return 'operation-calculate';
    }

    public function title(): string
    {
        return $this->title;
    }

    public function click(): void
    {
        $this->calculator->calculate();
    }
}
