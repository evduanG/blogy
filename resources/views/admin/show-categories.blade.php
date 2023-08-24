@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    @if (\Session::has('delete'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('delete') !!}</p>
                        </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Categories</h5>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Categories</a>
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach (['#', 'name', 'Posts', 'delete'] as $thName)
                                    <th scope="col"> {{ $thName }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->total }}</td>
                                    <td><a href="{{ route('categories.update', $category->id) }}"
                                            class="btn btn-warning text-white text-center ">Update
                                            Categories</a></td>
                                    <td>
                                        <form action="{{ route('categories.delete', $category->id) }}" method="POST"
                                            id="delete-form{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger text-center"
                                                onclick="showConfirmDialog({{ $category->id }})">Delete Categories</button>
                                            <div id="confirm-dialog{{ $category->id }}" style="display: none;">
                                                <p>Are you sure you want to delete this category?</p>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete({{ $category->id }})">Yes</button>
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="hideConfirmDialog({{ $category->id }})">Cancel</button>
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
