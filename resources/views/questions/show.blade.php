@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Question')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('View')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('topic')</th>
                    <td>{{ $question->topic->title or '' }}</td></tr><tr><th>@lang('question-text')</th>
                    <td>{!! $question->question_text !!}</td></tr><tr><th>@lang('code-snippet')</th>
                    <td>{!! $question->code_snippet !!}</td></tr><tr><th>@lang('answer-explanation')</th>
                    <td>{!! $question->answer_explanation !!}</td></tr><tr><th>@lang('more-info-link')</th>
                    <td>{{ $question->more_info_link }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('questions.index') }}" class="btn btn-primary">@lang('BACK')</a>
        </div>
    </div>
@stop
