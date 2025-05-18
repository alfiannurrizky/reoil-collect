<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyTargetChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Target Pengumpulan Oli Bekas')
            ->setSubtitle('Periode Januari - Juni 2025')
            ->addData('Target (liter)', [500, 700, 800, 600, 1000, 900])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'])
            ->setFontColor(' #5477e2');
    }
}