<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Users',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'translation_key'       => 'user',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => 'Lists',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\WaitingList',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'waitingList',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where($settings2['filter_field'], '>=',
                        now()->subDays($settings2['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Campaigns',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Campaign',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'campaign',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                if (isset($settings3['filter_days'])) {
                    return $query->where($settings3['filter_field'], '>=',
                        now()->subDays($settings3['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings3['filter_period'])) {
                    switch ($settings3['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings3['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Pages',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\LandingPage',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'landingPage',
        ];

        $settings4['total_number'] = 0;
        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                if (isset($settings4['filter_days'])) {
                    return $query->where($settings4['filter_field'], '>=',
                        now()->subDays($settings4['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings4['filter_period'])) {
                    switch ($settings4['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings4['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        $settings5 = [
            'chart_title'           => 'Engagement (Opens)',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Engagement',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'open',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'engagement',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => 'Engagement (Clicks)',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Engagement',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'click',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'engagement',
        ];

        $chart6 = new LaravelChart($settings6);

        $settings7 = [
            'chart_title'           => 'Recent  Payments',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Payment',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'amount_paid',
            'filter_field'          => 'created_at',
            'filter_days'           => '30',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'fields'                => [
                'stripe_transaction' => '',
                'amount_paid'        => '',
                'credit'             => '',
                'created_at'         => '',
            ],
            'translation_key' => 'payment',
        ];

        $settings7['data'] = [];
        if (class_exists($settings7['model'])) {
            $settings7['data'] = $settings7['model']::latest()
                ->take($settings7['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings7)) {
            $settings7['fields'] = [];
        }

        $settings8 = [
            'chart_title'           => 'Delivery Reports',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Report',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'total_delivered',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'fields'                => [
                'campaign'        => 'title',
                'total_sent'      => '',
                'total_delivered' => '',
            ],
            'translation_key' => 'report',
        ];

        $settings8['data'] = [];
        if (class_exists($settings8['model'])) {
            $settings8['data'] = $settings8['model']::latest()
                ->take($settings8['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings8)) {
            $settings8['fields'] = [];
        }

        return view('home', compact('chart1', 'chart5', 'chart6', 'settings2', 'settings3', 'settings4', 'settings7', 'settings8'));
    }
}
