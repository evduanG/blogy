@extends('layouts.app')

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <img style="max-height: 300px;" src="{{ asset('assets/user_images/' . $profile->image . '') }}">
                        <h1 class="mb-4">{{ $profile->name }}</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <p> {{ $profile->bio }}</p>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">

                    <!-- END sidebar-box -->
                    <div class="sidebar-box" style="padding: 20px;">
                        <h3 class="heading">Lastse Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach ($laststPosts as $post)
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
                <!-- END sidebar -->

            </div>
        </div>
    </section>



    <!-- End posts-entry -->
@endsection
