<?php

/* @var $this yii\web\View */

$this->title = 'Calculator';
?>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h1 class="text-right"><?= $calculator->printEquation() ?></h1>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-6">
                <?= $calculator->getButton('operation-clear')->render(['class' => 'btn btn-info btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-(')->render(['class' => 'btn btn-info btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-)')->render(['class' => 'btn btn-info btn-block']) ?>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
                <?= $calculator->getButton('operand-7')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-8')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-9')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-/')->render(['class' => 'btn btn-info btn-block']) ?>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
                <?= $calculator->getButton('operand-4')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-5')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-6')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-*')->render(['class' => 'btn btn-info btn-block']) ?>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
                <?= $calculator->getButton('operand-1')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-2')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-3')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand--')->render(['class' => 'btn btn-info btn-block']) ?>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
                <?= $calculator->getButton('operand-0')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-.')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operation-calculate')->render(['class' => 'btn btn-default btn-block']) ?>
            </div>
            <div class="col-md-3">
                <?= $calculator->getButton('operand-+')->render(['class' => 'btn btn-info btn-block']) ?>
            </div>
        </div>

        <?php if ($calculator->getHistory()->hasModels()): ?>
            <div>
                <div class="page-header">
                    <h3>History</h3>
                </div>
                <div class="list-group">
                    <?php foreach ($calculator->getHistory()->getModels() as $model): ?>
                        <?= $calculator->getButton('history-' . $model->id)->render(['class' => 'list-group-item']) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
