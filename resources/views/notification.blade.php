@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">Your Notification</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($notifications as $notification)
                            <li class="list-group-item">
                                Your Status "{{ $notification->data['message']}}"
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
