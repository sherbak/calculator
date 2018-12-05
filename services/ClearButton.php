<?php

namespace app\services;

class ClearButton extends Button
{
    public function __construct(Calculator $calculator, string $title)
    {
        parent::__construct($calculator, $title);
    }

    public function code(): string
    {
        return 'operation-clear';
    }

    public function title(): string
    {
        return $this->title;
    }

    public function click(): void
    {
        $this->calculator->setEquation('');
    }
}
