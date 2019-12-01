@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Update a discussion</div>

                <div class="card-body">
                <form action="{{ route('discussions.update', ['id' => $discussion->id]) }}" method="post">
                        {{ csrf_field() }}

   

                        <div class="form-group">
                              <label for="content">Ask a question</label>
                              <!-- <input id="content" type="hidden" name="content" value="{{ $discussion->content }}">
                              <trix-editor  input="content"></trix-editor> -->
                              <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $discussion->content }}</textarea>

                        </div>
                        <div class="form-group">
                              <button class="btn btn-success pull-right" type="submit">Save discussion changes</button>
                        </div>
                    </form>
                </div>

            </div>

@endsection

