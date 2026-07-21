@extends('admin.layouts.app')

@section('title', 'API Endpoints')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>API Endpoints</h2>
        <a href="{{ route('admin.api-endpoints.create', ['key' => 'raffa']) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Endpoint
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Method</th>
                            <th>Endpoint</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($endpoints as $endpoint)
                        <tr>
                            <td>{{ $endpoint->order }}</td>
                            <td>{{ $endpoint->name }}</td>
                            <td>
                                <span class="badge badge-{{ $endpoint->method === 'GET' ? 'success' : ($endpoint->method === 'POST' ? 'primary' : 'warning') }}">
                                    {{ $endpoint->method }}
                                </span>
                            </td>
                            <td><code>{{ $endpoint->endpoint }}</code></td>
                            <td>
                                @if($endpoint->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.api-endpoints.edit', [$endpoint, 'key' => 'raffa']) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.api-endpoints.destroy', [$endpoint, 'key' => 'raffa']) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No API endpoints found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
