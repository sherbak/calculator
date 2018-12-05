<?php

namespace app\services;

use Yii;

class Calculator
{
    protected $buttons = [];
    protected $history;


    public function getButton(string $code): Button
    {
        if (isset($this->buttons[$code])) {
            return $this->buttons[$code];
        }

        throw new \RuntimeException('Button ' . $code . ' does not exist.');
    }

    public function setButton(Button $button): void
    {
        $this->buttons[$button->code()] = $button;
    }

    public function setEquation(string $equation): void
    {
        $session = Yii::$app->session;
        $session->set('equation', $equation);
    }

    public function getEquation(): string
    {
        $session = Yii::$app->session;
        return $session->has('equation') ? $session->get('equation') : '';
    }

    public function printEquation()
    {
        return $this->getEquation() != '' ? $this->getEquation() : '0';
    }

    public function setHistory(History $history): void
    {
        $this->history = $history;
    }

    public function getHistory(): History
    {
        return $this->history;
    }

    public function calculate(): void
    {
        $equation = $this->getEquation();

        if ($this->history) {
            $this->history->add($equation);
        }

        $equation = eval('return ' . $equation . ';');
        $this->setEquation($equation);
    }
}
