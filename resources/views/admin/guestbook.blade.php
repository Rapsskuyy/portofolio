<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Buku Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar">
                <div class="brand-header">
                    <div class="brand-icon">R</div>
                    <div>
                        <h6 class="fw-bold mb-0">Raffa Admin</h6>
                        <small class="text-secondary" style="font-size: 11px;">CMS Dashboard</small>
                    </div>
                </div>

                <div class="nav flex-column">
                    <a class="nav-link-custom" href="{{ route('admin.dashboard') }}"><i class="fas fa-comments"></i> Testimoni</a>
                    <a class="nav-link-custom active" href="{{ route('admin.guestbook.index') }}"><i class="fas fa-book"></i> Buku Tamu</a>
                    <a class="nav-link-custom" href="{{ route('admin.coding_projects.index') }}"><i class="fas fa-laptop-code"></i> Project Coding</a>
                    <a class="nav-link-custom" href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper"></i> Blog Posts</a>
                    <a class="nav-link-custom" href="{{ route('admin.mock_apis.index') }}"><i class="fas fa-server"></i> Mock APIs</a>
                    <a class="nav-link-custom" href="{{ route('admin.project-details.index') }}"><i class="fas fa-layer-group"></i> Detail Specs</a>
                    <hr style="border-color: var(--border-color); margin: 20px 0;">
                    <a class="nav-link-custom" href="{{ route('portfolio.index') }}" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="nav-link-custom w-100 text-start text-danger border-0 bg-transparent">
                            <i class="fas fa-sign-out-alt text-danger"></i> Logout
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Mobile Offcanvas -->
            <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="mobileSidebar">
                <div class="offcanvas-header border-bottom border-secondary">
                    <h5 class="offcanvas-title fw-bold">Menu Admin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="nav flex-column">
                        <a class="nav-link-custom" href="{{ route('admin.dashboard') }}"><i class="fas fa-comments"></i> Testimoni</a>
                        <a class="nav-link-custom active" href="{{ route('admin.guestbook.index') }}"><i class="fas fa-book"></i> Buku Tamu</a>
                        <a class="nav-link-custom" href="{{ route('admin.coding_projects.index') }}"><i class="fas fa-laptop-code"></i> Project Coding</a>
                        <a class="nav-link-custom" href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper"></i> Blog Posts</a>
                        <a class="nav-link-custom" href="{{ route('admin.mock_apis.index') }}"><i class="fas fa-server"></i> Mock APIs</a>
                        <a class="nav-link-custom" href="{{ route('admin.project-details.index') }}"><i class="fas fa-layer-group"></i> Detail Specs</a>
                        <hr>
                        <a class="nav-link-custom" href="{{ route('portfolio.index') }}" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link-custom w-100 text-start text-danger border-0 bg-transparent mt-2">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 ms-sm-auto main-content">
                <div class="mb-4">
                    <h3 class="fw-bold mb-1">Manajemen Buku Tamu</h3>
                    <p class="text-secondary small mb-0">Daftar pesan dan salam dari pengunjung portfolio Anda.</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-20 text-success border-0 rounded-3 mb-4 alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card-custom">
                    <div class="table-responsive">
                        <table class="table table-dark-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Pengirim</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $msg)
                                    <tr>
                                        <td><span class="text-secondary small">{{ $msg->created_at ? $msg->created_at->format('d/m/Y H:i') : '-' }}</span></td>
                                        <td><div class="fw-bold">{{ $msg->name }}</div></td>
                                        <td><span class="text-secondary small">{{ $msg->email ?? '-' }}</span></td>
                                        <td>
                                            <div style="max-width: 400px;" class="text-truncate text-white-50" title="{{ $msg->message }}">
                                                {{ $msg->message }}
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.guestbook.delete', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan buku tamu ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-2" title="Hapus">
                                                    <i class="fas fa-trash me-1"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-secondary">
                                            <i class="fas fa-book-open fa-3x mb-3 d-block opacity-40"></i>
                                            Belum ada pesan di buku tamu.
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
