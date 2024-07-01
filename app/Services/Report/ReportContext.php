<?php

namespace App\Services\Report;

class ReportContext
{
    public function __construct(
        private readonly ReportStrategyInterface $strategy
    ) {}

    public function executeStrategy($transactions): array {
        return $this->strategy->generate($transactions);
    }
}