@extends('layouts.admin')

@section('content')
    <div class="row">
        @foreach ($count as $key => $val)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $key }}</h5>
                        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
                        <p class="card-text">{{ 'number of posts: ' . $val }}</p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
