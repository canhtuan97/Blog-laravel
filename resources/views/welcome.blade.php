@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row" style="margin-top: 10px">
        <div class="col-md-8" >
            <div class="row" style="background: #b8c2cc">
                <div class="col-md-5"></div>
                <div class="col-md-3"><h4><strong> Bài Viết</strong></h4></div>
            </div>
            <br>
            <div class="row" style="background: blanchedalmond">
            @foreach($posts as $post)

                <div class="row">
                    <div class="col-md-1"><img src="{{ asset('image/avata.jpg') }}" alt="User Icon" style="width: 50px;border-radius: 50%" /></div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2">{{$post->user->username}}</div>
                            <div class="col-md-10" style="color: #b1c2d3">{{$post->created_at}}</div>
                        </div>
                        <a href="{{route('show.details.post',['id'=>$post->id])}}">
                            <div class="row">
                                <div class="col-md-10" style="color: black"><h4><strong>{{$post->tieude}}</strong> </h4></div>
                            </div>
                        </a>
                        <a href="">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="#" onclick="event.preventDefault();
                                    document.getElementById('tagname').submit();"><strong style="color: #0040ff">{{$post->tagname}}</strong></a></li>
                                    <form id="tagname" action="{{ route('timkiem') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden"  name="tagname" value="{{$post->tagname}}">
                                    </form>
                                    </a>
                                </div>
                            </div>
                        </a>
                        <div class="row">
                            <div class="col-md-1"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
                            <div class="col-md-10">{{$post->like}}</div>
                        </div>
                    </div>

                </div>
                <hr>


            @endforeach

            </div>
            {!! $posts -> links() !!}
        </div>


        <div class="col-md-1"></div>
        <div class="col-md-3" >
            <div class="row">
                <div class="row" style="background: #b8c2cc">
                    <div class="col-md-2"></div>
                    <div class="col-md-10"><h4><strong>Câu hỏi</strong></h4></div>
                </div>
                <br>
                <div class="row">
                    @foreach($questions as $question)
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <a href="{{route('show.details.question',['id'=>$question->id])}}">
                        <div class="row">
                            <div class="col-md-10" style="color: black"><h4><strong>{{$question->tieude}}</strong></h4></div>
                        </div>
                        </a>
                        <div class="row">
                            <div class="col-md-10" style="color: #b1c2d3">{{$question->user->username}}</div>
                        </div>

                        </div>
                    </div>

                    @endforeach
                </div>
                <hr>
                </div>
                <div class="row">
                    <div class="row" style="background: #b8c2cc">
                        <div class="col-md-2"></div>
                        <div class="col-md-10"><h4><strong>Top đăng</strong></h4></div>
                    </div>

                    <div class="row">
                        <div class="panel panel-default">
                        <br>
                         @foreach($tops as $key=>$sum)
                        <div class="row">
                            <div class="col-md-1"><img src="{{ asset('image/avata.jpg') }}" alt="User Icon" style="width: 50px;border-radius: 50%" /></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-11">{{$key}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
                                    <div class="col-md-10">{{$sum}}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>

            </div>

        </div>    
    </div>
</div>
@endsection('content')