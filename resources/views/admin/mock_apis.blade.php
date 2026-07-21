<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Mock APIs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #212529; color: white; padding: 20px; }
        .main-content { padding: 30px; }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <h4 class="mb-4">Admin Raffa</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.dashboard', ['key' => 'raffa']) }}">
                            <i class="fas fa-comments me-2"></i> Testimoni
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.guestbook.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-book me-2"></i> Buku Tamu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.coding_projects.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-laptop-code me-2"></i> Project Coding
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.posts.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-newspaper me-2"></i> Blog Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="{{ route('admin.mock_apis.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-server me-2"></i> Mock APIs
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link text-white-50" href="{{ route('portfolio.index') }}">
                            <i class="fas fa-external-link-alt me-2"></i> Lihat Web
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manajemen Mock APIs</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus"></i> Tambah API
                    </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Method</th>
                                        <th>Path</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($apis as $api)
                                        <tr>
                                            <td>
                                                <span class="badge bg-{{ $api->method === 'GET' ? 'primary' : 'success' }}">{{ $api->method }}</span>
                                            </td>
                                            <td><code>/api/v1/{{ $api->path }}</code></td>
                                            <td>{{ $api->description ?? '-' }}</td>
                                            <td>
                                                @if($api->is_active)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $api->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.mock_apis.delete', ['mockApi' => $api->id, 'key' => 'raffa']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $api->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Mock API</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('admin.mock_apis.update', ['mockApi' => $api->id, 'key' => 'raffa']) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label">Method</label>
                                                                    <select name="method" class="form-select" required>
                                                                        <option value="GET" {{ $api->method == 'GET' ? 'selected' : '' }}>GET</option>
                                                                        <option value="POST" {{ $api->method == 'POST' ? 'selected' : '' }}>POST</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-8 mb-3">
                                                                    <label class="form-label">Path (tanpa /api/v1/)</label>
                                                                    <input type="text" name="path" class="form-control" value="{{ $api->path }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Deskripsi</label>
                                                                <input type="text" name="description" class="form-control" value="{{ $api->description }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Response Body (JSON)</label>
                                                                <textarea name="response_body" class="form-control" rows="8" required>{{ json_encode($api->response_body, JSON_PRETTY_PRINT) }}</textarea>
                                                            </div>
                                                            <div class="mb-3 form-check">
                                                                <input type="checkbox" name="is_active" class="form-check-input" id="isActive{{ $api->id }}" value="1" {{ $api->is_active ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="isActive{{ $api->id }}">Aktif</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">Belum ada Mock API</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mock API Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.mock_apis.store', ['key' => 'raffa']) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Method</label>
                                <select name="method" class="form-select" required>
                                    <option value="GET">GET</option>
                                    <option value="POST">POST</option>
                                </select>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Path (tanpa /api/v1/)</label>
                                <input type="text" name="path" class="form-control" placeholder="contoh: users" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <input type="text" name="description" class="form-control" placeholder="Penjelasan singkat endpoint ini">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Response Body (JSON)</label>
                            <textarea name="response_body" class="form-control" rows="8" placeholder='{"status": "success", "data": []}' required></textarea>
                            <small class="text-muted">Pastikan format JSON valid.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
