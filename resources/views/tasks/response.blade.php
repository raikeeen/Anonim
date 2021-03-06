<link rel="stylesheet" href="{{asset('css/search.css')}}">
<link rel="stylesheet" href="{{asset('css/listTaskAndInfo.css')}}">

@extends('layouts.front')
@section('title')
    <div class="container containerTask" style="padding-top: 90px">
        <div class="row">
            <div class="col-md-8 bigList" style="padding-left: 0px;padding-right: 0px; margin-left: 25px;">
                <div class="row" style="position: relative;box-sizing: border-box;padding: 25px 75px 25px 20px;">
                    <div class="col-md-12 taskDetailTitle">
                        {{$tasks->name}}
                    </div>
                    <div class="col-md-12 taskFinance">
                        {{$tasks->price}} руб. за выполнение<br>
                    </div>
                    <div class="col-md-12 taskTags">
                        16 июня 2019, 09:46 • 0 откликов • 6 просмотров<br>
                    </div>
                    <div class="col-md-12 taskDescription">
                        {!! $tasks->about !!}
                    </div>

                </div>
                <div class="userBlockInfo">
                    <div class="userBlockInfoTitle" >
                            Отклики на заявку
                    </div>
                </div>

                <div class="tabMenu">
                    <div class="tabItems">
                        <a href="{{route('tasks-my-response',['id' => $id])}}" class="tabLiks line">
                            Все ({{$taskAll}})
                        </a>
                        <a  href="{{route('tasks-my-response-select',['id' => $id])}}" class="tabLiks line">
                            Выбранные ({{$taskSelect}})
                        </a>

                    </div>
                    <hr>
                </div>

                @foreach($AddTaskUser as $TaskUser)
                    @foreach($users as $user)
                        @if($TaskUser->idUser == $user->id)
                <div class="userForm row" style="padding: 25px">
                    <img class="avatario" src="{{url('storage/'.$user->avatar)}}" style="width: 50px; height: 50px; border: 0px;">
                    <div class="col-md-10" style="font-size: 19px;">
                        <a href="{{ url('/users').'/'.$user->id}}">{{$user->name}}</a><br>
                        <div style="font-size: 15px;word-wrap: break-word;">
                            {{$TaskUser->about}}
                        </div>
                        <div style="margin-bottom: 30px">
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="">
                                <form method="post" action="{{route('tasks-my-response-post',['id' => $tasks->id, 'idUser' => $TaskUser->idUser])}}" style="margin-block-end:0px;">
                                    @csrf
                                    <button class="btn btn-warning" style="padding: 10px 20px;     font-size: 11px;">Назначить исполнителем</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                        @endif
                    @endforeach
                @endforeach

                <div class="emptyBlockHolder">
                    <div class="emptyBlockRecommendations">
                        <div class="emptyBlockTitle">
                            <div class="emptyBlockTitleRec">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
