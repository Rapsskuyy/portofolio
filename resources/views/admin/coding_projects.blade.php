<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Project Coding</title>
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

        /* Sidebar Styling */
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

        /* Cards & Tables */
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

        /* Modal styling */
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
            color: #fff;
            border-radius: 10px;
            padding: 10px 14px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            border-color: var(--primary);
            color: #fff;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
        }

        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        /* Mobile Header */
        .mobile-navbar {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 12px 20px;
        }

        .project-thumb {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }
    </style>
    @include('admin.partials.responsive-styles')
</head>
<body>
    @include('admin.partials.mobile-navigation')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.sidebar', ['active' => 'coding-projects'])
            <!-- Main Content Area -->
            <main class="col-12 col-xl-10 ms-xl-auto main-content">

                <div class="admin-page-header mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Manajemen Project Coding</h3>
                        <p class="text-secondary small mb-0">Kelola daftar project, upload screenshot/gambar dari komputer, dan spesifikasi teknis.</p>
                    </div>
                    <button class="btn btn-primary px-3 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#addModal" style="background: var(--primary); border: none;">
                        <i class="fas fa-plus me-2"></i> Tambah Project Baru
                    </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-20 text-success border-0 rounded-3 mb-4 alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Tutup notifikasi"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger bg-danger bg-opacity-20 text-danger border-0 rounded-3 mb-4 alert-dismissible fade show">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ $errors->first() }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Tutup notifikasi"></button>
                    </div>
                @endif

                <!-- Projects Table Card -->
                <div class="card-custom">
                    <div class="table-responsive">
                        <table class="table table-dark-custom admin-mobile-table align-middle">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Kategori</th>
                                    <th>Tipe</th>
                                    <th>Tahun</th>
                                    <th>Teknologi</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $project)
                                    @php
                                        $imagePath = $project->image_url;
                                        if (strpos($imagePath, 'storage/') === 0 || strpos($imagePath, 'images/') === 0) {
                                            $imageUrl = asset($imagePath);
                                        } else {
                                            $imageUrl = asset('images/coding-projects/' . $imagePath);
                                        }
                                    @endphp
                                    <tr>
                                        <td class="admin-table-primary" data-label="Project">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $imageUrl }}" alt="{{ $project->title }}" class="project-thumb" onerror="this.src='https://via.placeholder.com/150?text=No+Image'">
                                                <div>
                                                    <div class="fw-bold">{{ $project->title }}</div>
                                                    <div class="text-secondary small text-truncate" style="max-width: 250px;">{{ $project->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Kategori"><span class="badge bg-indigo text-indigo bg-opacity-20 border border-indigo px-2 py-1 rounded-2" style="background: rgba(99,102,241,0.15); color: #a5b4fc;">{{ ucfirst($project->category) }}</span></td>
                                        <td data-label="Tipe">
                                            @if(($project->type ?? 'school') == 'internship')
                                                <span class="badge bg-success bg-opacity-20 border border-success text-success px-2 py-1 rounded-2">Internship</span>
                                            @elseif(($project->type ?? 'school') == 'personal')
                                                <span class="badge bg-warning bg-opacity-20 border border-warning text-warning px-2 py-1 rounded-2">Personal</span>
                                            @else
                                                <span class="badge bg-info bg-opacity-20 border border-info text-info px-2 py-1 rounded-2">School</span>
                                            @endif
                                        </td>
                                        <td data-label="Tahun"><span class="text-secondary small">{{ $project->year ?? '-' }}</span></td>
                                        <td data-label="Teknologi">
                                            <div class="d-flex flex-wrap gap-1">
                                                @if(is_array($project->technologies))
                                                    @foreach($project->technologies as $tech)
                                                        <span class="badge bg-secondary bg-opacity-40 text-light fw-normal" style="font-size: 11px;">{{ $tech }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-end" data-label="Aksi">
                                            <div class="admin-row-actions">
                                                <button class="btn btn-sm btn-outline-light rounded-2 me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </button>
                                                <form action="{{ route('admin.coding_projects.delete', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-2" aria-label="Hapus project {{ $project->title }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    @if(false)
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content modal-content-dark">
                                                <div class="modal-header modal-header-dark">
                                                    <h5 class="modal-title fw-bold"><i class="fas fa-edit text-primary me-2"></i>Edit Project - {{ $project->title }}</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('admin.coding_projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body p-4">
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Judul Project</label>
                                                                <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="form-label">Kategori</label>
                                                                <input type="text" name="category" class="form-control" value="{{ $project->category }}" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="form-label">Tipe</label>
                                                                <select name="type" class="form-select bg-dark text-white border-secondary">
                                                                    <option value="school" {{ ($project->type ?? 'school') == 'school' ? 'selected' : '' }}>School</option>
                                                                    <option value="internship" {{ ($project->type ?? 'school') == 'internship' ? 'selected' : '' }}>Internship</option>
                                                                    <option value="personal" {{ ($project->type ?? 'school') == 'personal' ? 'selected' : '' }}>Personal</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="form-label">Tahun</label>
                                                                <input type="number" name="year" class="form-control" value="{{ $project->year }}">
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Deskripsi Singkat</label>
                                                                <textarea name="description" class="form-control" rows="3" required>{{ $project->description }}</textarea>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Teknologi (pisahkan dengan koma)</label>
                                                                <input type="text" name="technologies" class="form-control" value="{{ is_array($project->technologies) ? implode(', ', $project->technologies) : '' }}">
                                                            </div>
                                                            
                                                            <!-- File Upload Image dari Komputer -->
                                                            <div class="col-md-6">
                                                                <label class="form-label"><i class="fas fa-upload me-1 text-info"></i> Upload Gambar (Dari Explorer Computer)</label>
                                                                <input type="file" name="image_file" class="form-control" accept="image/*">
                                                                <small class="text-secondary" style="font-size: 11px;">Pilih file image (PNG, JPG, WEBP, SVG) maks 5MB.</small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Atau Path/URL Gambar Manual</label>
                                                                <input type="text" name="image_url" class="form-control" value="{{ $project->image_url }}">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Live Demo URL</label>
                                                                <input type="text" name="demo_url" class="form-control" value="{{ $project->demo_url }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">GitHub Repository URL</label>
                                                                <input type="text" name="github_url" class="form-control" value="{{ $project->github_url }}">
                                                            </div>
                                                            
                                                            <div class="col-12"><hr class="my-2 border-secondary"></div>
                                                            <div class="col-12"><h6 class="fw-bold text-indigo"><i class="fas fa-code me-2"></i>Spesifikasi Teknis Backend</h6></div>

                                                            <div class="col-12">
                                                                <label class="form-label">System Architecture</label>
                                                                <textarea name="architecture_diagram" class="form-control" rows="3">{{ $project->architecture_diagram }}</textarea>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Database Schema</label>
                                                                <textarea name="database_schema" class="form-control" rows="3">{{ $project->database_schema }}</textarea>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Code Snippet Terbaik</label>
                                                                <textarea name="code_snippet" class="form-control text-monospace" rows="4" style="font-family: monospace;">{{ $project->code_snippet }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer modal-footer-dark">
                                                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @empty
                                    <tr class="admin-empty-row">
                                        <td colspan="6" class="text-center py-5 text-secondary">
                                            <i class="fas fa-folder-open fa-3x mb-3 d-block opacity-40"></i>
                                            Belum ada project coding. Klik tombol <strong>Tambah Project Baru</strong>!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @foreach($projects as $project)
                    @include('admin.partials.coding-project-edit-modal', ['project' => $project])
                @endforeach
            </main>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addCodingProjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content modal-content-dark">
                <div class="modal-header modal-header-dark">
                    <h2 class="modal-title h5 fw-bold" id="addCodingProjectLabel"><i class="fas fa-plus-circle text-primary me-2" aria-hidden="true"></i>Tambah Project Coding Baru</h2>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup form tambah project"></button>
                </div>
                <form action="{{ route('admin.coding_projects.store') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column flex-grow-1 overflow-hidden" style="min-height: 0;">
                    @csrf
                    <div class="modal-body p-4" style="overflow-y: auto; max-height: calc(100dvh - 12rem);">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Judul Project</label>
                                <input type="text" name="title" class="form-control" placeholder="Contoh: E-Commerce REST API" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="category" class="form-control" value="web" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Tipe</label>
                                <select name="type" class="form-select bg-dark text-white border-secondary">
                                    <option value="school" selected>School</option>
                                    <option value="internship">Internship</option>
                                    <option value="personal">Personal</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Tahun</label>
                                <input type="number" name="year" class="form-control" value="{{ date('Y') }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Deskripsi Singkat</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Penjelasan singkat mengenai fitur utama project..." required></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Teknologi (pisahkan dengan koma)</label>
                                <input type="text" name="technologies" class="form-control" placeholder="Laravel, MySQL, Redis, Docker">
                            </div>
                            
                            <!-- File Upload Image dari Komputer -->
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-upload me-1 text-info"></i> Upload Gambar (Dari Explorer Computer)</label>
                                <input type="file" name="image_file" class="form-control" accept="image/*">
                                <small class="text-secondary" style="font-size: 11px;">Pilih file image (PNG, JPG, WEBP, SVG) maks 5MB.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Atau Path/URL Gambar Manual</label>
                                <input type="text" name="image_url" class="form-control" placeholder="Contoh: images/coding-projects/demo.png">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Live Demo URL</label>
                                <input type="text" name="demo_url" class="form-control" placeholder="https://myproject.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">GitHub Repository URL</label>
                                <input type="text" name="github_url" class="form-control" placeholder="https://github.com/Rapsskuyy/myproject">
                            </div>
                            
                            <div class="col-12"><hr class="my-2 border-secondary"></div>
                            <div class="col-12"><h6 class="fw-bold text-indigo"><i class="fas fa-code me-2"></i>Spesifikasi Teknis Backend</h6></div>

                            <div class="col-12">
                                <label class="form-label">System Architecture</label>
                                <textarea name="architecture_diagram" class="form-control" rows="3" placeholder="Perancangan arsitektur microservice/monolith..."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Database Schema</label>
                                <textarea name="database_schema" class="form-control" rows="3" placeholder="e.g. Users: id, name. Orders: id, user_id, amount."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Code Snippet Terbaik</label>
                                <textarea name="code_snippet" class="form-control text-monospace" rows="4" style="font-family: monospace;" placeholder="// Contoh potongan kode penting..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-dark flex-shrink-0">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-plus me-1"></i> Simpan Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
