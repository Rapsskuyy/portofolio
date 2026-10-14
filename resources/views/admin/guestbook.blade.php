<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Buku Tamu</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
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
    @include('admin.partials.responsive-styles')
</head>
<body>
    @include('admin.partials.mobile-navigation')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.sidebar', ['active' => 'guestbook'])
            <!-- Main Content -->
            <main class="col-12 col-xl-10 ms-xl-auto main-content">
                <div class="mb-4">
                    <h3 class="fw-bold mb-1">Manajemen Buku Tamu</h3>
                    <p class="text-secondary small mb-0">Daftar pesan dan salam dari pengunjung portfolio Anda.</p>
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
                                        <td data-label="Waktu"><span class="text-secondary small">{{ $msg->created_at ? $msg->created_at->format('d/m/Y H:i') : '-' }}</span></td>
                                        <td class="admin-table-primary" data-label="Pengirim"><div class="fw-bold">{{ $msg->name }}</div></td>
                                        <td data-label="Email"><span class="text-secondary small admin-break-text">{{ $msg->email ?? '-' }}</span></td>
                                        <td data-label="Pesan">
                                            <div style="max-width: 400px;" class="text-truncate text-white-50" title="{{ $msg->message }}">
                                                {{ $msg->message }}
                                            </div>
                                        </td>
                                        <td class="text-end" data-label="Aksi">
                                            <div class="admin-row-actions">
                                            <form action="{{ route('admin.guestbook.delete', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan buku tamu ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-2" title="Hapus">
                                                    <i class="fas fa-trash me-1"></i> Hapus
                                                </button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="admin-empty-row">
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
