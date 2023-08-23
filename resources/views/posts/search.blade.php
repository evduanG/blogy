@extends('layouts.app')

@section('content')
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">{{ 'results for: ' . $search }}</div>
                </div>
            </div>
            <div class="row posts-entry">
                <div class="col-lg-8">
                    @foreach ($results as $post)
                        <div class="blog-entry d-flex blog-entry-search-item">
                            <a href="{{ route('post.single', $post->id) }}" class="img-link me-4">
                                <img src="{{ asset('assets/images/' . $post->image . '') }}" alt="Image"
                                    class="img-fluid">
                            </a>

                            <div>
                                <span class="date">{{ \Carbon\Carbon::parse($post->created_at)->format('M d,Y') }}
                                    &bullet; <a
                                        href="{{ route('category.single', $post->category) }}">{{ $post->category }}</a></span>
                                <h2><a href="{{ route('post.single', $post->id) }}">{{ $post->title }}</a></h2>
                                <p>{{ substr($post->description, 0, 50) }}</p>
                                <p><a href="{{ route('post.single', $post->id) }}"
                                        class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="col-lg-4 sidebar">

                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="sidebar-box" style="padding: 20px;">
                            <h3 class="heading">Popular Posts</h3>
                            <div class="post-entry-sidebar">
                                <ul>
                                    @foreach ($pupPost as $post)
                                        <li>
                                            <a href="{{ route('post.single', $post->id) }}">
                                                <img src="{{ asset('assets/images/' . $post->image . '') }}"
                                                    class="me-4 rounded">
                                                <div class="text">
                                                    <h4>{{ substr($post->title, 0, 35) . ' ...' }}</h4>
                                                    <div class="post-meta">
                                                        <span
                                                            class="mr-2">{{ \Carbon\Carbon::parse($post->created_at)->format('M d,Y') }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->


                    <div class="sidebar-box" style="padding: 20px;">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li><a
                                        href="{{ route('category.single', $category->name) }}">{{ $category->name }}<span>({{ $category->total }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->
                </div>
            </div>
        </div>
    </div>
@endsection
