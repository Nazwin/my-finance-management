<?php

namespace App\Services\Report;

class CategoryReportStrategy implements ReportStrategyInterface
{

    public function generate($transactions): array
    {
        $report = [];
        foreach ($transactions as $transaction) {
            $category = $transaction->category->name;
            if (!isset($report[$category])) {
                $report[$category] = ['income' => 0, 'expense' => 0];
            }
            if ($transaction->category->type == 'income') {
                $report[$category]['income'] += $transaction->amount;
            } else {
                $report[$category]['expense'] += $transaction->amount;
            }
        }
        return $report;
    }
}