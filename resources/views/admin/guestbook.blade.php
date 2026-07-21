<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Buku Tamu</title>
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
                        <a class="nav-link text-white {{ Request::routeIs('admin.dashboard') ? 'active' : 'text-white-50' }}" href="{{ route('admin.dashboard', ['key' => 'raffa']) }}">
                            <i class="fas fa-comments me-2"></i> Testimoni
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::routeIs('admin.guestbook.index') ? 'active' : 'text-white-50' }}" href="{{ route('admin.guestbook.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-book me-2"></i> Buku Tamu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::routeIs('admin.coding_projects.index') ? 'active' : 'text-white-50' }}" href="{{ route('admin.coding_projects.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-laptop-code me-2"></i> Project Coding
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::routeIs('admin.posts.index') ? 'active' : 'text-white-50' }}" href="{{ route('admin.posts.index', ['key' => 'raffa']) }}">
                            <i class="fas fa-newspaper me-2"></i> Blog Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::routeIs('admin.mock_apis.index') ? 'active' : 'text-white-50' }}" href="{{ route('admin.mock_apis.index', ['key' => 'raffa']) }}">
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
                    <h1 class="h2">Manajemen Buku Tamu</h1>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages as $msg)
                                        <tr>
                                            <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                                            <td><strong>{{ $msg->name }}</strong></td>
                                            <td>{{ $msg->email ?? '-' }}</td>
                                            <td>
                                                <div style="max-width: 400px;" class="text-truncate" title="{{ $msg->message }}">
                                                    {{ $msg->message }}
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.guestbook.delete', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">Belum ada pesan buku tamu.</td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
