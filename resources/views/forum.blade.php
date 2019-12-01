 @extends('layouts.app')

@section('content')
    @foreach($discussions as $discussion)

            <div class="card">
                <div class="card-header">
               
                        <img src="{{  $discussion->user->avatar }}" alt="" width="50px" height="50px">&nbsp;&nbsp;&nbsp;
                        <span>{{  $discussion->user->name }}, <b>{{  $discussion->created_at->diffForHumans() }}</b></span>
                       <a href="{{ route('discussion', ['slug' =>  $discussion->slug ]) }}" class="btn btn-primary pull-right" style="margin-left:9px;">view</a>


                       @if($discussion->hasBestAnswer())
                            <span class="btn pull-right btn-success">closed</span>
                        @else
                            <span class="btn pull-right btn-danger">open</span>
            
                        @endif
                </div>

                <div class="card-body">
                    
                    <h4 class="text-center">
                        <b>{{ $discussion->title }}</b>
                    </h4>
                    <p class="text-center">
                        {!! Markdown::convertToHtml(str_limit($discussion->content, 50)) !!}
                    </p>

                </div>

                <div class="card-footer">

                    <span>
                        {{  $discussion->replies->count() }} Replies
                    </span>
                    <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="pull-right btn btn-outline-secondary btn-sm">#{{ $discussion->channel->title }}</a>
                </div>
                
               

            </div>

            <br/>

    @endforeach

    
        <div class="text-center">
            {{ $discussions->links() }}
        </div>

@endsection

