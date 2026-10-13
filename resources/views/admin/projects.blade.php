<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Galeri Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-main);
            min-height: 100vh;
        }

        .sidebar {
            min-height: 100vh;
            background-color: var(--card-bg);
            border-right: 1px solid var(--border-color);
            padding: 24px 16px;
        }

        .brand-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--text-muted);
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            margin-bottom: 4px;
        }

        .nav-link-custom:hover {
            color: white;
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link-custom.active {
            color: white;
            background: var(--primary);
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
        }

        .main-content {
            padding: 30px;
        }

        .card-custom {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .table-dark-custom {
            --bs-table-bg: transparent;
            --bs-table-color: var(--text-main);
            margin-bottom: 0;
        }

        .table-dark-custom th {
            background: rgba(15, 23, 42, 0.6);
            color: var(--text-muted);
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .table-dark-custom td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 14px;
        }

        .modal-content-dark {
            background-color: #1e293b;
            color: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 20px;
        }

        .modal-header-dark {
            border-bottom: 1px solid var(--border-color);
            padding: 20px 24px;
        }

        .modal-footer-dark {
            border-top: 1px solid var(--border-color);
            padding: 16px 24px;
        }

        .form-control, .form-select {
            background-color: #0f172a;
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #f8fafc;
            border-radius: 10px;
            padding: 10px 14px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            border-color: var(--primary);
            color: #f8fafc;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
        }

        .project-thumb {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid var(--border-color);
        }

        .mobile-navbar {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 12px 20px;
        }
    </style>
</head>
<body>

    <!-- Mobile Top Header -->
    <div class="mobile-navbar d-md-none d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <div class="brand-icon">R</div>
            <span class="fw-bold">Admin Raffa</span>
        </div>
        <button class="btn btn-outline-light btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="container-fluid">
        <div class="row">

            <!-- Desktop Sidebar -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar">
                <div class="brand-header">
                    <div class="brand-icon">R</div>
                    <div>
                        <h6 class="fw-bold mb-0">Raffa Admin</h6>
                        <small class="text-secondary" style="font-size: 11px;">CMS Dashboard</small>
                    </div>
                </div>

                <div class="nav flex-column">
                    <a class="nav-link-custom" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-comments"></i> Testimoni
                    </a>
                    <a class="nav-link-custom" href="{{ route('admin.guestbook.index') }}">
                        <i class="fas fa-book"></i> Buku Tamu
                    </a>
                    <a class="nav-link-custom active" href="{{ route('admin.projects.index') }}">
                        <i class="fas fa-images"></i> Galeri Project
                    </a>
                    <a class="nav-link-custom" href="{{ route('admin.coding_projects.index') }}">
                        <i class="fas fa-laptop-code"></i> Project Coding
                    </a>
                    <a class="nav-link-custom" href="{{ route('admin.posts.index') }}">
                        <i class="fas fa-newspaper"></i> Blog Posts
                    </a>
                    <a class="nav-link-custom" href="{{ route('admin.mock_apis.index') }}">
                        <i class="fas fa-server"></i> Mock APIs
                    </a>
                    <a class="nav-link-custom" href="{{ route('admin.project-details.index') }}">
                        <i class="fas fa-layer-group"></i> Detail Specs
                    </a>

                    <hr style="border-color: var(--border-color); margin: 20px 0;">

                    <a class="nav-link-custom" href="{{ route('portfolio.index') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i> Lihat Website
                    </a>

                    <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="nav-link-custom w-100 text-start text-danger border-0 bg-transparent">
                            <i class="fas fa-sign-out-alt text-danger"></i> Logout
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="col-md-9 col-lg-10 ms-sm-auto main-content">

                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <div>
                        <h3 class="fw-bold mb-1">Manajemen Galeri Project</h3>
                        <p class="text-secondary small mb-0">Kelola dokumentasi event, kepanitiaan, dan galeri portfolio yang tampil di section Gallery.</p>
                    </div>
                    <button class="btn btn-primary px-3 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#addModal" style="background: var(--primary); border: none;">
                        <i class="fas fa-plus me-2"></i> Tambah Galeri Baru
                    </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-20 text-success border-0 rounded-3 mb-4 alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger bg-danger bg-opacity-20 text-danger border-0 rounded-3 mb-4 alert-dismissible fade show">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ $errors->first() }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Projects Table Card -->
                <div class="card-custom">
                    <div class="table-responsive">
                        <table class="table table-dark-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Item Galeri</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Link</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $project)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $project->formatted_image_url }}" alt="{{ $project->title }}" class="project-thumb" onerror="this.src='https://via.placeholder.com/150?text=No+Image'">
                                                <div>
                                                    <div class="fw-bold">{{ $project->title }}</div>
                                                    <div class="text-secondary small text-truncate" style="max-width: 320px;">{{ $project->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary bg-opacity-40 text-light fw-normal px-2 py-1">{{ $project->order }}</span>
                                        </td>
                                        <td>
                                            @if($project->is_visible)
                                                <span class="badge bg-success bg-opacity-20 border border-success text-success px-2 py-1 rounded-2">Tampil</span>
                                            @else
                                                <span class="badge bg-secondary bg-opacity-20 border border-secondary text-secondary px-2 py-1 rounded-2">Tersembunyi</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                @if($project->project_url)
                                                    <a href="{{ $project->project_url }}" target="_blank" class="text-info text-decoration-none small"><i class="fas fa-external-link-alt"></i> Web</a>
                                                @endif
                                                @if($project->github_url)
                                                    <a href="{{ $project->github_url }}" target="_blank" class="text-light text-decoration-none small"><i class="fab fa-github"></i> Repo</a>
                                                @endif
                                                @if(!$project->project_url && !$project->github_url)
                                                    <span class="text-secondary small">-</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-light me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus item galeri ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content modal-content-dark">
                                                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header modal-header-dark">
                                                        <h5 class="modal-title fw-bold">Edit Item Galeri: {{ $project->title }}</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <div class="row g-3">
                                                            <div class="col-md-8">
                                                                <label class="form-label small text-secondary">Judul Item / Event</label>
                                                                <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label small text-secondary">Urutan Tampil</label>
                                                                <input type="number" name="order" class="form-control" value="{{ $project->order }}">
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label small text-secondary">Deskripsi Ringkas</label>
                                                                <textarea name="description" class="form-control" rows="3" required>{{ $project->description }}</textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label small text-secondary">Ganti Gambar (Upload File)</label>
                                                                <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                                                                <small class="text-secondary" style="font-size: 11px;">Maksimal 5MB (JPG, PNG, WebP). Kosongkan jika tidak diubah.</small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label small text-secondary">Atau URL Gambar Eksternal</label>
                                                                <input type="text" name="image_url" class="form-control" value="{{ $project->image_url }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label small text-secondary">Link Project (Opsional)</label>
                                                                <input type="url" name="project_url" class="form-control" value="{{ $project->project_url }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label small text-secondary">Link GitHub (Opsional)</label>
                                                                <input type="url" name="github_url" class="form-control" value="{{ $project->github_url }}">
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check form-switch mt-2">
                                                                    <input class="form-check-input" type="checkbox" name="is_visible" value="1" id="visibleCheck{{ $project->id }}" {{ $project->is_visible ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="visibleCheck{{ $project->id }}">Tampilkan di website publik</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer modal-footer-dark">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary" style="background: var(--primary); border: none;">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-secondary">
                                            <i class="fas fa-images fa-3x mb-3 opacity-25 d-block"></i>
                                            Belum ada item galeri project yang ditambahkan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-content-dark">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header modal-header-dark">
                        <h5 class="modal-title fw-bold">Tambah Item Galeri Baru</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small text-secondary">Judul Item / Event</label>
                                <input type="text" name="title" class="form-control" placeholder="Contoh: Bulan Bahasa 2025" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small text-secondary">Urutan Tampil</label>
                                <input type="number" name="order" class="form-control" value="0">
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-secondary">Deskripsi Ringkas</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi peran atau kegiatan..." required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-secondary">Upload Gambar</label>
                                <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                                <small class="text-secondary" style="font-size: 11px;">Maksimal 5MB (JPG, PNG, WebP).</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-secondary">Atau URL Gambar</label>
                                <input type="text" name="image_url" class="form-control" placeholder="https://... atau projects/gambar.jpg">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-secondary">Link Project (Opsional)</label>
                                <input type="url" name="project_url" class="form-control" placeholder="https://...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-secondary">Link GitHub (Opsional)</label>
                                <input type="url" name="github_url" class="form-control" placeholder="https://github.com/...">
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_visible" value="1" id="visibleCheckAdd" checked>
                                    <label class="form-check-label" for="visibleCheckAdd">Tampilkan di website publik</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-dark">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" style="background: var(--primary); border: none;">Simpan Galeri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
