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
        .option-input.checkbox {
            border-radius: 0%;
        }
        .option-input.checkbox::after {
            border-radius: 0%;
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
                            <li class="breadcrumb-item active">Form Checkbox</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form id="validateform" action="" method="POST">
                        @csrf
                        <a class="job-list">
                            <div class="job-list-det">
                                <div class="job-list-desc">
                                    <h3 class="job-list-title">Question One</h3>
                                </div>
                            </div>
                            <div class="job-list-footer">
                                <h4 class="job-list-title">Programe</h4>
                                <input type="hidden" name="question" value="FF">
                                <label>
                                    <input type="checkbox" class="option-input checkbox" name="ff" value="HTML">
                                    HTML
                                </label>
                                <label>
                                    <input type="checkbox" class="option-input checkbox" name="ff" value="CSS">
                                    CSS
                                </label>
                                <label>
                                    <input type="checkbox" class="option-input checkbox" name="ff" value="PHP">
                                    PHP
                                </label>
                            </div>
                        </a>
                        <a class="job-list">
                            <div class="job-list-det">
                                <div class="job-list-desc">
                                    <h3 class="job-list-title">Question Two</h3>
                                </div>
                            </div>
                            <div class="job-list-footer">
                                <h4 class="job-list-title">Programe</h4>
                                <input type="hidden" name="question" value="FF">
                                <label>
                                    <input type="checkbox" class="option-input checkbox" name="ff" value="C++">
                                    C++
                                </label>
                                <label>
                                    <input type="checkbox" class="option-input checkbox" name="ff" value=" C#">
                                    C#
                                </label>
                            </div>
                        </a>
                        <a class="job-list">
                            <div class="job-list-det">
                                <div class="job-list-desc">
                                    <h3 class="job-list-title">Question Three</h3>
                                </div>
                            </div>
                            <div class="job-list-footer">
                                <h4 class="job-list-title">Programe</h4>
                                <input type="hidden" name="question" value="FF">
                                <label>
                                    <input type="checkbox" class="option-input checkbox" name="ff" value="JAVA">
                                    JAVA
                                </label>
                                <label>
                                    <input type="checkbox" class="option-input checkbox" name="ff" value="Not.js">
                                    Not.js
                                </label>
                            </div>
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
