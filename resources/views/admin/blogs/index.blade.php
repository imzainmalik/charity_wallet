@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2">
                                <h3>All Blogs</h3>
                            </div>
                            <div class="col-10 d-flex justify-content-end">
                                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Create Blogs</a>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blogs->count() > 0)
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($blogs as $blog)
                                    @php
                                        $category = App\Models\BlogCategory::where('id', $blog->category)->first();
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $blog->title }}</td>
                                        <td><img src="{{ asset($blog->thumbnail) }}" style="width: 80px;" alt="">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($blog->status == 1)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-danger">InActive</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
