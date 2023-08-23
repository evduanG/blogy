@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Update Post</h3>
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
            <form action="{{ route('post.update', $single->id) }}" method="POST" class="p-5 bg-light"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" placeholder="title" name="title" value="{{ $single->title }}"
                        class="form-control" id="title">
                    @error('title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea placeholder="description" name="description" cols="30" rows="10" class="form-control">{{ $single->description }}</textarea>
                    @error('description')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-select" aria-label="Default select example">
                        <option selected>Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $single->user_id }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_name" value="{{ $single->user_name }}" class="btn btn-primary">
                </div>

                @auth
                    <div class="form-group">
                        <input type="submit" name="submit" value="Upddate Comment" class="btn btn-primary">
                    </div>
                @endauth

            </form>


        </div>
    </div>
@endsection
