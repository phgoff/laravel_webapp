@extends('layouts.app')

@section('content')
    <h3 class="page-title">You can add Topics here!</h3>



    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('List')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($topics) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>@lang('Name')</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($topics) > 0)
                        @foreach ($topics as $topic)
                            <tr data-entry-id="{{ $topic->id }}">


                                <td>{{ $topic->title }}</td>
                                <td>
                                    <a href="{{ route('topics.show',[$topic->id]) }}" class="btn btn-xl btn-primary">@lang('View')</a>
                                    <a href="{{ route('topics.edit',[$topic->id]) }}" class="btn btn-xl btn-info">@lang('Edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are_you_sure")."');",
                                        'route' => ['topics.destroy', $topic->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xl btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('No_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <p>
                <a href="{{ route('topics.create') }}" class="btn btn-success">@lang('ADD TOPIC')</a>
            </p>
        </div>
    </div>
@stop
