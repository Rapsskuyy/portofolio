<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Coding Projects</title>
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
                        <a class="nav-link text-white active" href="{{ route('admin.coding_projects.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-laptop-code me-2"></i> Project Coding
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.posts.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-newspaper me-2"></i> Blog Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.mock_apis.index', ['key' => 'raffa']) }}">
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
                    <h1 class="h2">Manajemen Project Coding</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus"></i> Tambah Project
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
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tahun</th>
                                        <th>Teknologi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($projects as $project)
                                        <tr>
                                            <td>{{ $project->title }}</td>
                                            <td><span class="badge bg-secondary">{{ $project->category }}</span></td>
                                            <td>{{ $project->year }}</td>
                                            <td>
                                                @if(is_array($project->technologies))
                                                    @foreach($project->technologies as $tech)
                                                        <span class="badge bg-info text-dark">{{ $tech }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.coding_projects.delete', ['codingProject' => $project->id, 'key' => 'raffa']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Project</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('admin.coding_projects.update', ['codingProject' => $project->id, 'key' => 'raffa']) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Judul Project</label>
                                                                    <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label class="form-label">Kategori</label>
                                                                    <input type="text" name="category" class="form-control" value="{{ $project->category }}" required>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label class="form-label">Tahun</label>
                                                                    <input type="number" name="year" class="form-control" value="{{ $project->year }}">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Deskripsi Singkat</label>
                                                                <textarea name="description" class="form-control" rows="3" required>{{ $project->description }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Teknologi (pisahkan dengan koma)</label>
                                                                <input type="text" name="technologies" class="form-control" value="{{ is_array($project->technologies) ? implode(', ', $project->technologies) : '' }}">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label">Image URL</label>
                                                                    <input type="text" name="image_url" class="form-control" value="{{ $project->image_url }}">
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label">Demo URL</label>
                                                                    <input type="text" name="demo_url" class="form-control" value="{{ $project->demo_url }}">
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label">GitHub URL</label>
                                                                    <input type="text" name="github_url" class="form-control" value="{{ $project->github_url }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <hr>
                                                            <h6 class="mb-3">Spesifikasi Teknis Khusus Backend Developer</h6>
                                                            
                                                            <div class="mb-3">
                                                                <label class="form-label">System Architecture (Diagram / Deskripsi)</label>
                                                                <textarea name="architecture_diagram" class="form-control" rows="4">{{ $project->architecture_diagram }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Database Schema</label>
                                                                <textarea name="database_schema" class="form-control" rows="4" placeholder="e.g. Users: id, name, email. Posts: id, user_id, title.">{{ $project->database_schema }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Code Snippet (Contoh kode terbaik)</label>
                                                                <textarea name="code_snippet" class="form-control text-monospace" rows="6" style="font-family: monospace;">{{ $project->code_snippet }}</textarea>
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
                                            <td colspan="5" class="text-center py-4">Belum ada Project Coding</td>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Project Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.coding_projects.store', ['key' => 'raffa']) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul Project</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="category" class="form-control" value="web" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tahun</label>
                                <input type="number" name="year" class="form-control" value="{{ date('Y') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teknologi (pisahkan dengan koma)</label>
                            <input type="text" name="technologies" class="form-control" placeholder="Laravel, MySQL, Bootstrap">
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Image URL</label>
                                <input type="text" name="image_url" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Demo URL</label>
                                <input type="text" name="demo_url" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">GitHub URL</label>
                                <input type="text" name="github_url" class="form-control">
                            </div>
                        </div>
                        
                        <hr>
                        <h6 class="mb-3">Spesifikasi Teknis Khusus Backend Developer</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">System Architecture (Diagram / Deskripsi)</label>
                            <textarea name="architecture_diagram" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Database Schema</label>
                            <textarea name="database_schema" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code Snippet (Contoh kode terbaik)</label>
                            <textarea name="code_snippet" class="form-control text-monospace" rows="6" style="font-family: monospace;"></textarea>
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
