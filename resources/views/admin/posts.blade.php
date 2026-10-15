<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Blog Posts</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
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

        .main-content { padding: 30px; }

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

        .modal-header-dark { border-bottom: 1px solid var(--border-color); padding: 20px 24px; }
        .modal-footer-dark { border-top: 1px solid var(--border-color); padding: 16px 24px; }

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

        .mobile-navbar {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 12px 20px;
        }

        .note-editor {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            color: #000;
        }
    </style>
    @include('admin.partials.responsive-styles')
</head>
<body>
    @include('admin.partials.mobile-navigation')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.sidebar', ['active' => 'posts'])
            <!-- Main Content -->
            <main class="col-12 col-xl-10 ms-xl-auto main-content">
                <div class="admin-page-header mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Manajemen Blog & Artikel</h3>
                        <p class="text-secondary small mb-0">Tulis artikel teknis dan pengumuman untuk ditampilkan di portfolio.</p>
                    </div>
                    <button class="btn btn-primary px-3 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#addModal" style="background: var(--primary); border: none;">
                        <i class="fas fa-plus me-2"></i> Tulis Artikel Baru
                    </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-20 text-success border-0 rounded-3 mb-4 alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Tutup notifikasi"></button>
                    </div>
                @endif

                <div class="card-custom">
                    <div class="table-responsive">
                        <table class="table table-dark-custom admin-mobile-table align-middle">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Dilihat</th>
                                    <th>Tanggal</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                    <tr>
                                        <td class="admin-table-primary" data-label="Judul">
                                            <div class="fw-bold">{{ $post->title }}</div>
                                            <div class="text-secondary small text-truncate" style="max-width: 250px;">{{ $post->excerpt }}</div>
                                        </td>
                                        <td data-label="Kategori"><span class="badge bg-indigo text-indigo bg-opacity-20 border border-indigo px-2 py-1 rounded-2" style="background: rgba(99,102,241,0.15); color: #a5b4fc;">{{ $post->category ?? 'Umum' }}</span></td>
                                        <td data-label="Status">
                                            @if($post->is_published)
                                                <span class="badge bg-success bg-opacity-20 text-success border border-success border-opacity-30 px-2 py-1 rounded-2">Published</span>
                                            @else
                                                <span class="badge bg-secondary bg-opacity-20 text-secondary border border-secondary border-opacity-30 px-2 py-1 rounded-2">Draft</span>
                                            @endif
                                        </td>
                                        <td data-label="Dilihat"><span class="text-secondary small"><i class="fas fa-eye me-1"></i>{{ $post->views_count }}</span></td>
                                        <td data-label="Tanggal"><span class="text-secondary small">{{ $post->created_at ? $post->created_at->format('d/m/Y') : '-' }}</span></td>
                                        <td class="text-end" data-label="Aksi">
                                            <div class="admin-row-actions">
                                                <button class="btn btn-sm btn-outline-light rounded-2 me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $post->id }}">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </button>
                                                <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-2" aria-label="Hapus artikel {{ $post->title }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr class="admin-empty-row">
                                        <td colspan="6" class="text-center py-5 text-secondary">
                                            <i class="fas fa-newspaper fa-3x mb-3 d-block opacity-40"></i>
                                            Belum ada artikel ditulis.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @foreach($posts as $post)
                    @include('admin.partials.post-edit-modal', ['post' => $post])
                @endforeach
            </main>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addPostLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content modal-content-dark">
                <div class="modal-header modal-header-dark">
                    <h2 class="modal-title h5 fw-bold" id="addPostLabel">Tulis Artikel Baru</h2>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup form tambah artikel"></button>
                </div>
                <form action="{{ route('admin.posts.store') }}" method="POST" class="d-flex flex-column flex-grow-1 overflow-hidden" style="min-height: 0;">
                    @csrf
                    <div class="modal-body p-4" style="overflow-y: auto; max-height: calc(100dvh - 12rem);">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Judul Artikel</label>
                                <input type="text" name="title" class="form-control" placeholder="Judul artikel..." required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="category" class="form-control" placeholder="Laravel / Backend / Tips">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Konten Artikel</label>
                                <textarea name="content" class="form-control summernote" rows="8" required></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_published" value="1" id="publishCheckAdd" checked>
                                    <label class="form-check-label" for="publishCheckAdd">Publikasikan Langsung</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-dark flex-shrink-0">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4">Simpan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Tulis isi artikel lengkap di sini...',
                tabsize: 2,
                height: 200
            });
        });
    </script>
</body>
</html>
