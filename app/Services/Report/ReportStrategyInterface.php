<?php

namespace App\Services\Report;

interface ReportStrategyInterface
{
    public function generate($transactions): array;
}