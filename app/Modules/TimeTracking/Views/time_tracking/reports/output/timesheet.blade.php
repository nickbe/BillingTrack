@extends('reports.layouts.master')

@section('content')

    <h1 style="margin-bottom: 0;">@lang('fi.time_tracking')</h1>
    <h3 style="margin: 0;">{{ $results['company_profile'] }}</h3>
    <h3 style="margin-top: 0;">{{ $results['from_date'] }} - {{ $results['to_date'] }}</h3>
    <br>

    @foreach ($results['projects'] as $project)
        <h3>{{ $project['name'] }}</h3>
        <table class="alternate">
            <thead>
            <tr>
                <th>@lang('fi.task')</th>
                <th>@lang('fi.start_time')</th>
                <th>@lang('fi.stop_time')</th>
                <th class="amount">@lang('fi.unbilled_hours')</th>
                <th class="amount">@lang('fi.billed_hours')</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($project['tasks'] as $task)
                @foreach ($task['timers'] as $timer)
                    <tr>
                        <td>{{ $task['name'] }}</td>
                        <td>{{ $timer['start_at'] }}</td>
                        <td>{{ $timer['end_at'] }}</td>
                        <td class="amount">@if (!$task['billed']){{ $timer['hours'] }}@endif</td>
                        <td class="amount">@if ($task['billed']){{ $timer['hours'] }}@endif</td>
                    </tr>
                @endforeach
            @endforeach
            <tr>
                <td colspan="3" class="total">@lang('fi.total'):</td>
                <td class="total">{{ $project['hours_unbilled'] }}</td>
                <td class="total">{{ $project['hours_billed'] }}</td>
            </tr>
            </tbody>
        </table>
    @endforeach

@stop