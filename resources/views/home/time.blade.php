@extends('layouts.home')
@section('title', $head['title'])
@section('keywords', $head['keywords'])
@section('description', $head['description'])
@section('css')
    <style type="text/css">
        .time-line {
            border-radius: 5px;
            background: #fff;
        }

        .time-axis {
            position: relative;
            width: 95%;
            margin: 0 auto;
            overflow: hidden;
            padding: 45px 0px;
        }

        .time-axis::before {
            content: ' ';
            display: block;
            width: 8px;
            height: 90%;
            background-color: rgb(255, 187, 172);
            position: absolute;
            left: 50%;
            top: 0;
            margin-left: -4px;
            margin-top: 30px;
            z-index: 5;
            border-radius: 4px;
        }

        .time-axis li {
            margin-bottom: 5px;
        }

        .time-axis li::after {
            content: "";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        .time-axis li .direction {
            position: relative;
            width: 48%;
        }

        .time-axis li .direction-r {
            float: right;
            animation: sport-r 1s linear 0s 1 forwards;
        }

        @keyframes sport-r {
            0% {
                margin-right: -500px;
            }
            50% {
                margin-right: 20px;
            }
            75% {
                margin-right: -10px;
            }
            100% {
                margin-right: 0px;
            }
        }

        .time-axis li .direction-l {
            float: left;
            margin-left: 10px;
            animation: sport-l 1s linear 0s 1 forwards;
        }

        @keyframes sport-l {
            0% {
                margin-left: -500px;
            }
            50% {
                margin-left: 20px;
            }
            75% {
                margin-left: -10px;
            }
            100% {
                margin-left: 0px;
            }
        }

        .time-axis li .flag-wrapper {
            position: relative;
            background: rgb(248, 248, 248);
            padding: 8px 12px;
            border-radius: 5px;
            text-align: left;
            font-size: 12px;
        }

        .time-axis li .direction-l .flag-wrapper {
            box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.15);
        }

        .time-axis li .direction-r .flag-wrapper {
            box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15);
        }

        .time-axis li .flag-wrapper::after,
        .time-axis li .flag-wrapper::before {
            content: "";
            position: absolute;
            top: 50%;
            height: 0;
            width: 0;
            margin-top: -7px;
            z-index: 20;
            border-width: 8px;
            border-style: solid;
        }

        .time-axis li .direction-l .flag-wrapper::after {
            border-color: transparent transparent transparent rgb(248, 248, 248);
            right: -16px;
        }

        .time-axis li .direction-l .flag-wrapper::before {
            right: -17px;
            border-color: transparent transparent transparent #ddd;
        }

        .time-axis li .direction-r .flag-wrapper::after {
            border-color: transparent rgb(248, 248, 248) transparent transparent;
            left: -16px;
        }

        .time-axis li .direction-r .flag-wrapper::before {
            left: -17px;
            border-color: transparent #ddd transparent transparent;
        }

        .time-axis li .flag-wrapper .dot {
            top: 50%;
            content: ' ';
            position: absolute;
            width: 11px;
            height: 11px;
            margin-top: -4px;
            border-radius: 50%;
            background-color: #ED502E;
            z-index: 30;
        }

        .time-axis li .direction-l .flag-wrapper .dot {
            right: -5.5%;
        }

        .time-axis li .direction-r .flag-wrapper .dot {
            left: -5.5%;
        }

        .time-axis li:hover .flag-wrapper .flag {
            color: #ED502E;
        }

        .time-axis li .flag-wrapper .time-wrapper {
            color: #aaa;
            display: block;
            margin-bottom: 6px;
        }

        .time-axis li .flag-wrapper .tar {
            text-align: right;
        }

        .time-axis li .flag-wrapper .flag {
            /*white-space: nowrap;*/
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .time-axis li .flag-wrapper .flag a{
            color:#1299da ;
        }
        @media screen and (max-width: 767px) {
            .time-axis::before {
                width: 4px;
                margin-left: -2px;
                border-radius: 2px;
            }
        }

        @media screen and (max-width: 766px) and (min-width: 561px) {
            .time-axis li .direction-l .flag-wrapper .dot {
                right: -5.5%;
            }

            .time-axis li .direction-r .flag-wrapper .dot {
                left: -5.5%;
            }

            .time-axis li .flag-wrapper .dot {
                width: 8px;
                height: 8px;
            }
        }

        @media screen and (max-width: 560px) {

            .time-axis li .direction-l .flag-wrapper .dot {
                right: -5.5%;
            }

            .time-axis li .direction-r .flag-wrapper .dot {
                left: -5.5%;
            }

            .time-axis li .flag-wrapper .dot {
                width: 5px;
                height: 5px;
                margin-top: -3px;
            }
        }
    </style>
@endsection
@section('body')
    <div class="main-left">
        <div class="time-line">
            <ul class="time-axis">
                @foreach ($times as $item)
                    <li>
                        <div class="direction @if($loop->odd)direction-l @else direction-r @endif">
                            <div class="flag-wrapper">
                                <span class="dot"></span>
                                <span class="time-wrapper">{{$item->created_at}}</span>
                                <p class="flag">@if($item->type==1) {{$item->content}} @else 发表文章：<a href="/article/{{$item->article_id}}">{{$item->content}}</a> @endif </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
@section('js')
@endsection