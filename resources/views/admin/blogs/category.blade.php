@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2">
                                <h3>All Blog Categories</h3>
                            </div>
                            <div class="col-10 d-flex justify-content-end">
                                <a href="javascript;" data-toggle="modal" data-target="#createModal"
                                    class="btn btn-primary">Create Category</a>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">CreatedAt</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blog_cate->count() > 0)
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($blog_cate as $blog_catee)
                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $blog_catee->name }}</td>
                                        <td>
                                            @if ($blog_catee->status == 1)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-danger">InActive</div>
                                            @endif
                                        </td>
                                        <td>{{ $blog_catee->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModal{{ $blog_catee->id }}">Edit</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal{{ $blog_catee->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.blog.update', $blog_catee->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="col-12">
                                                            <label for="">Category</label>
                                                            <input type="text" required class="form-control"
                                                                value="{{ $blog_catee->name }}" name="name"
                                                                placeholder="Category name">
                                                            <br>
                                                            <label for="status">Active Status</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="" disabled>
                                                                    select Active Status
                                                                </option>
                                                                <option value="0"
                                                                    @if ($blog_catee->status == 0) selected @endif> In
                                                                    active</option>
                                                                <option value="1"
                                                                    @if ($blog_catee->status == 1) selected @endif>Active
                                                                </option>
                                                            </select>
                                                        </div>
                                                        {{-- <div class="col-6 py-4">
                                                            <button class="btn btn-primary">Submit</button>
                                                        </div> --}}  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $blog_cate->links() }}
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.blog.category_save') }}" method="post">
                        @csrf
                        <div class="col-6">
                            <label for="">Category</label>
                            <input type="text" required class="form-control" name="name" placeholder="Category name">
                        </div>
                        {{-- <div class="col-6 py-4">
                            <button class="btn btn-primary">Submit</button>
                        </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
