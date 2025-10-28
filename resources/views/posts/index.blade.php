@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">All Posts</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">+ New Post</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ Str::limit($post->content, 80) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-id="{{ $post->id }}"
                                        data-title="{{ $post->title }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No posts found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong id="postTitle"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const postTitle = deleteModal.querySelector('#postTitle');
            const form = deleteModal.querySelector('#deleteForm');

            postTitle.textContent = title;
            form.action = `/posts/${id}`;
        });
    </script>
@endsection
