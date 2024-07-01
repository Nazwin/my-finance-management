<?php

namespace App\Services\Report;

use Carbon\Carbon;

class MonthlyReportStrategy implements ReportStrategyInterface
{

    public function generate($transactions): array
    {
        $report = [];
        foreach ($transactions as $transaction) {
            $month = Carbon::parse($transaction->transaction_date)->format('Y-m');
            if (!isset($report[$month])) {
                $report[$month] = ['income' => 0, 'expense' => 0];
            }
            if ($transaction->category->type == 'income') {
                $report[$month]['income'] += $transaction->amount;
            } else {
                $report[$month]['expense'] += $transaction->amount;
            }
        }
        return $report;
    }
}