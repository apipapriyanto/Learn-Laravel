@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
            @endif

            <div class="card">
                <div class="card-header">What do you Mind?</div>

                <div class="card-body">
                    @if ($errors->has('status'))
                        <div class="alert alert-danger">{{ $errors->first('status') }}</div>
                    @endif
                    <form action="{{ route('status.store')}}" method="post">
                        {{ csrf_field() }}

                        <textarea name="status" id="" cols="30" rows="2" class="form-control" placeholder="Update your Status"></textarea>

                        <div class="float-right">
                            <button type="submit" class="btn btn-primary btn-sm">Send</button>  
                        </div>
                    </form>
                </div>
            </div>

                <hr>

            @foreach ($statuses as $status)
                <div class="card mb-3">
                    <div class="card-header"><strong>{{ $status->user->name }}</strong> ({{$status->created_at->diffForHumans()}}) </div>
    
                    <div class="card-body">
                       <p>{{ $status->status}}</p>
                       <span class="float-right">
                            <a href="{{route('status.show', $status->id)}}">Comments</a> ({{ $status->comments->count() }})
                       </span>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
