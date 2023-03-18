@extends('layouts.master')
@section('content')
@section('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <style>
        /*  customize check box radio*/
        label{
            display:block;
            line-height:25px;
        }
        .option-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            position: relative;
            top: 8px;
            right: 0;
            bottom: 0;
            left: 0;
            height: 25px;
            width: 25px;
            transition: all 0.15s ease-out 0s;
            background: #cbd1d8;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            margin-right: 0.5rem;
            outline: none;
            position: relative;
            z-index: 1000;
        }
        .option-input:hover {
            background: #9faab7;
        }
        .option-input:checked {
            background: #FF851A;
        }
        .option-input:checked::before {
            width: 25px;
            height: 25px;
            display:flex;
            content: '\f00c';
            font-size: 15px;
            font-weight:bold;
            position: absolute;
            align-items:center;
            justify-content:center;
            font-family:'Font Awesome 5 Free';
        }
        .option-input:checked::after {
            -webkit-animation: click-wave 0.65s;
            -moz-animation: click-wave 0.65s;
            animation: click-wave 0.65s;
            background: #FF851A;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
        }
        .option-input.radio {
            border-radius: 50%;
        }
        .option-input.radio::after {
            border-radius: 50%;
        }

        @keyframes click-wave {
        0% {
            height: 25px;
            width: 25px;
            opacity: 0.35;
            position: relative;
        } 100% {
            height: 150px;
            width: 150px;
            margin-left: -60px;
            margin-top: -60px;
            opacity: 0;
            }
        }
        /* end customize check box radio*/
    </style>
@endsection

    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Radio</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form id="validateform" action="{{ route('form/radio/save') }}" method="POST">
                        @csrf
                        <a class="job-list">
                            <div class="job-list-det">
                                <div class="job-list-desc">
                                    <h3 class="job-list-title">Question One</h3>
                                </div>
                            </div>
                            @foreach ($questions as $question)
                                @if ($question->question_id == '1')
                                    <div class="job-list-footer">
                                        <h4 class="job-list-title">{{ $question->question_name }}</h4>
                                        <input type="hidden" name="question_id1" value="{{ $question->question_id }}">
                                        @foreach ($answers as $answer)
                                            @if ($answer->question_id == '1')
                                            <label>
                                                <input type="radio" class="option-input radio" name="answer_name{{ $answer->question_id }}[]" value="{{ $answer->answer_name }}">
                                                {{ $answer->answer_name }}
                                            </label>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </a>
                        <a class="job-list">
                            <div class="job-list-det">
                                <div class="job-list-desc">
                                    <h3 class="job-list-title">Question Two</h3>
                                </div>
                            </div>
                            @foreach ($questions as $question)
                            @if ($question->question_id == '2')
                            <div class="job-list-footer">
                                <h4 class="job-list-title">{{ $question->question_name }}</h4>
                                <input type="hidden" name="question_id2" value="{{ $question->question_id }}">
                                @foreach ($answers as $answer)
                                @if ($answer->question_id == '2')
                                <label>
                                    <input type="radio" class="option-input radio" name="answer_name{{ $answer->question_id }}[]" value="{{ $answer->answer_name }}">
                                    {{ $answer->answer_name }}
                                </label>
                                @endif
                                @endforeach
                            </div>
                            @endif
                            @endforeach
                        </a>
                        <a class="job-list">
                            <div class="job-list-det">
                                <div class="job-list-desc">
                                    <h3 class="job-list-title">Question Three</h3>
                                </div>
                            </div>
                            @foreach ($questions as $question)
                                @if ($question->question_id == '3')
                                <div class="job-list-footer">
                                    <h4 class="job-list-title">{{ $question->question_name }}</h4>
                                    <input type="hidden" name="question_id3" value="{{ $question->question_id }}">
                                    @foreach ($answers as $answer)
                                        @if ($answer->question_id == '3')
                                        <label>
                                            <input type="radio" class="option-input radio" name="answer_name{{ $answer->question_id }}[]" value="{{ $answer->answer_name }}">
                                            {{ $answer->answer_name }}
                                        </label>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            @endforeach
                        </a>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
