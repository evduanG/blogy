@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Update Profile Info</h3>
            @if (\Session::has('update'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('update') !!}</p>
                </div>
            @endif
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="p-5 bg-light"
                enctype="multipart/form-data">
                @csrf
                {{-- email --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="email" name="email" value="{{ $user->email }}"
                        class="form-control" id="email">
                </div>
                {{-- name --}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="name" name="name" value="{{ $user->name }}" class="form-control"
                        id="name">
                </div>
                {{-- bio --}}
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea placeholder="bio" name="bio" cols="30" rows="10" class="form-control">{{ $user->bio }}</textarea>
                </div>
                <div class="form-group">
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 me-3 d-inline-block"><img
                                src="{{ asset('assets/user_images/' . $user->image . '') }}" alt="Image"
                                class="img-fluid"></figure>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-select" aria-label="Default select example">
                        <option selected>Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> --}}


                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
                </div>

                @auth
                    <div class="form-group">
                        <input type="submit" name="submit" value="Upddate Profile" class="btn btn-primary">
                    </div>
                @endauth

            </form>


        </div>
    </div>
@endsection
