@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Create a New Post</h3>
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
            <form action="{{ route('post.store') }}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" placeholder="title" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea placeholder="description" name="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <input type="hidden" name="user_id" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_name" class="btn btn-primary">
                </div>


                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Post Comment" class="btn btn-primary">
                </div>

            </form>


        </div>
    </div>
@endsection
