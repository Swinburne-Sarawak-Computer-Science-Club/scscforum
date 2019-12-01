@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

            <img src="{{  $discussion->user->avatar }}" alt="" width="50px" height="50px">&nbsp;&nbsp;&nbsp;
            <!-- Display point of the user, later can implement a badge system -->
            <span>{{ $discussion->user->name }}, <b><i class="fa fa-trophy fa-lg"></i> {{ $discussion->user->points }}</b></span>
            
            @if(Auth::id() == $discussion->user->id)
                <a href="{{ route('discussion.edit', ['slug' => $discussion->slug ]) }}" class="btn btn-info pull-right" style="margin-right: 8px;">Edit</a>
            @endif

            @if($discussion->hasBestAnswer())
                <span class="btn pull-right btn-success " style="margin-right: 8px;">closed</span>
            @else
                <span class="btn pull-right btn-danger" style="margin-right: 8px;">open</span>

            @endif


          

            @if($discussion->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch', ['id' => $discussion->id ]) }}" class="btn btn-outline-primary pull-right" style="margin-right: 8px;"><i class="fa fa-eye-slash"></i></a>
            @else
                <a href="{{ route('discussion.watch', ['id' => $discussion->id ]) }}" class="btn btn-outline-primary  pull-right" style="margin-right: 8px;"><i class="fa fa-eye"></i></a>
            @endif

      
    </div>

    <div class="card-body">
        
        <h4 class="text-center">
            <b>{!! $discussion->title !!}</b>
        </h4>

       
        <p class="text-center">
          {!! Markdown::convertToHtml($discussion->content) !!}
        </p>

            @if($best_answer)
                <div class="text-center" style="padding: 40px;">
                    <h3 class="text-center">BEST ANSWER</h3>
                    <div class="card" >
                        <div class="card-header bg-success text-white">
                            <img src="{{ $best_answer->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span>{{ $best_answer->user->name }} <b>( {{ $best_answer->user->points }} )</b></span>
                        </div>

                        <div class="card-body">
                        {!!$best_answer->content!!}
                        </div>
                    </div>
                </div>
            @endif
    </div>

        <div class="card-footer">

            <span>
                {{  $discussion->replies->count() }} Replies
            </span>
                 <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="pull-right btn btn-outline-secondary btn-sm">#{{ $discussion->channel->title }}</a>
        </div>
    </div>

    <br/>

        
            @foreach($discussion->replies as $reply)
            <div class="card card-default">

                <div class="card-header">

                    <img src="{{  $reply->user->avatar }}" alt="" width="50px" height="50px">&nbsp;&nbsp;&nbsp;
                    <span>{{  $reply->user->name }}, <b>{{  $reply->created_at->diffForHumans() }}</b></span>
                    @if(!$best_answer)
                        @if(Auth::id() == $discussion->user->id)

                                <a href="{{ route('discussion.best.answer', ['id' => $reply->id ]) }}" class="btn  btn-info  pull-right">Mark as best answer</a>
                         @endif

                    @endif

                </div>

                <div class="card-body">

                    <p class="text-center">
                        <!-- {!! Markdown::convertToHtml($reply->content) !!} -->
                       {!! $reply->content !!}
                    </p> 

                </div> 

                <div class="card-footer">

                    @if($reply->is_liked_by_auth_user())
                        <a href="{{ route('reply.unlike', ['id' => $reply->id ]) }}" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-o-up fa-lg"></i>  <span class="badge">{{ $reply->likes->count() }}</span></a>
                    @else
                        <a href="{{ route('reply.like', ['id' => $reply->id ]) }}" class="btn btn-secondary btn-sm"><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge">{{ $reply->likes->count() }}</span></a>
                    @endif

                </div>
                </div>

                <br/>
            @endforeach
        
            <div class="card ">
            <div class="card-body">
                @if(Auth::check())
                    <form action="{{ route('discussion.reply', ['id' => $discussion->id ]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="reply">Leave a reply...</label>

                            <input id="reply" type="hidden" name="reply">
                            <trix-editor input="reply"></trix-editor>
                        </div>

                        <div class="form-group">
                            <button class="btn pull-right">Leave a reply</button>
                        </div>
                    </form>
                @else

                    <div class="text-center">
                        <h2>Sign in to leave a reply</h2>
                    </div>
                @endif
            </div>
        </div>


@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>

@endsection

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">

@endsection
