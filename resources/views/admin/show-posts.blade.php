@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Posts</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                @foreach (['#', 'title', 'category', 'user', 'delete'] as $thName)
                                    <th scope="col"> {{ $thName }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ substr($post->title, 0, 25) . '...' }}</td>
                                    <td>{{ $post->category }}</td>
                                    <td>{{ $post->user_name }}</td>
                                    <td>
                                        <form action="{{ route('post.delete', $post->id, 'admins.dashboard') }}"
                                            method="POST" id="delete-form{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger text-center"
                                                onclick="showConfirmDialog({{ $post->id }})">Delete</button>
                                            <div id="confirm-dialog{{ $post->id }}" style="display: none;">
                                                <p>Are you sure you want to delete this post?</p>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete({{ $post->id }})">Yes</button>
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="hideConfirmDialog({{ $post->id }})">Cancel</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showConfirmDialog(id) {
            console.log('confirm-dialog' + id)
            document.getElementById('confirm-dialog' + id).style.display = 'block';
        }

        function hideConfirmDialog(id) {
            document.getElementById('confirm-dialog' + id).style.display = 'none';
        }

        function confirmDelete(id) {
            document.getElementById('delete-form' + id).submit();
        }
    </script>
@endsection
