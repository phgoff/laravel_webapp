@extends('layouts.app')

@section('content')
    <h3 class="page-title">Questions</h3>



    <!-- <div class="panel panel-default">
        <div class="panel-heading">
            @lang('list')
        </div> -->

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>

                        <th>TOPIC</th>
                        <th>TEXT</th>
                        <th>OPTION</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">

                                <td>{{ $question->topic->title or '' }}</td>
                                <td>{!! $question->question_text !!}</td>
                                <td>
                                    <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-secondary btn-primary">VIEW</a>
                                    <a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-secondary btn-info">EDIT</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['questions.destroy', $question->id])) !!}
                                    {!! Form::submit(trans('DELETE'), array('class' => 'btn btn-secondary btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('There are no questions here!')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <p>
                <a href="{{ route('questions.create') }}" class="btn btn-success">@lang('ADD NEW QUESTION')</a>
            </p>
        </div>
    </div>
@stop
