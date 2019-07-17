@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

             @if (session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
            @endif
            
                <div class="card mb-3">
                    <div class="card-header"><strong>{{ $status->user->name }}</strong> ({{$status->created_at->diffForHumans()}}) </div>
    
                    <div class="card-body">
                        <p>{{ $status->status}}</p>
                        {{-- <a href="{{route('status.show', $status->id)}}" class="float-right">Comments</a> --}}
                    </div>
                </div>

            <div class="card">
                <div class="card-header">Comment</div>

                <div class="card-body">
                    @if ($errors->has('message'))
                        <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                    @endif

                    <form action="{{ route('comment.store', $status)}}" method="post">
                        {{ csrf_field() }}

                        <textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Give Your Response.."></textarea>

                        <div class="float-right mt-2">
                            <button type="submit" class="btn btn-primary btn-sm">Comment</button>  
                        </div>
                    </form>
                </div>
            </div>

            <hr>

            @foreach ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-header"><strong>{{ $comment->user->name }}</strong> ({{$comment->created_at->diffForHumans()}}) </div>
    
                    <div class="card-body">
                       <p>{{ $comment->message}}</p>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
