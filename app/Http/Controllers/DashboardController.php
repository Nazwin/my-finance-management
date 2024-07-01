<?php

namespace App\Http\Controllers;

use App\Services\Report\CategoryReportStrategy;
use App\Services\Report\MonthlyReportStrategy;
use App\Services\Report\ReportContext;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request): \Inertia\Response
    {
        $report_strategy = $request->query('report_strategy', 'monthly');

        $transactions = auth()->user()->transactions()->get();

        $strategy = match ($report_strategy) {
            'category' => new CategoryReportStrategy(),
            default => new MonthlyReportStrategy(),
        };

        $context = new ReportContext($strategy);

        $report = $context->executeStrategy($transactions);

        return Inertia::render('Dashboard', [
            'report' => $report,
            'report_strategy' => $report_strategy,
        ]);
    }
}
