 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Testimonials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #212529; color: white; padding: 20px; }
        .main-content { padding: 30px; }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); }
        .badge-pending { background-color: #ffc107; color: #000; }
        .badge-published { background-color: #198754; color: #fff; }
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
                        <a class="nav-link text-white {{ Request::routeIs('admin.dashboard') ? 'active' : 'text-white-50' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-comments me-2"></i> Testimoni
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::routeIs('admin.guestbook.index') ? 'active' : 'text-white-50' }}" href="{{ route('admin.guestbook.index') }}">
                            <i class="fas fa-book me-2"></i> Buku Tamu
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
                    <h1 class="h2">Manajemen Testimoni</h1>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Rating</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($testimonials as $testimonial)
                                        <tr>
                                            <td>
                                                <strong>{{ $testimonial->name }}</strong><br>
                                                <small class="text-muted">{{ $testimonial->position }}</small>
                                            </td>
                                            <td>{{ $testimonial->email }}</td>
                                            <td>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-secondary opacity-25' }}"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                <div style="max-width: 300px;" class="text-truncate" title="{{ $testimonial->message }}">
                                                    {{ $testimonial->message }}
                                                </div>
                                            </td>
                                            <td>
                                                @if($testimonial->is_approved)
                                                    <span class="badge badge-published">Published</span>
                                                @else
                                                    <span class="badge badge-pending">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    @if(!$testimonial->is_approved)
                                                        <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button type="submit" class="btn btn-sm btn-success" title="Publish">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button type="submit" class="btn btn-sm btn-warning" title="Unpublish">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('admin.testimonials.delete', $testimonial) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">Belum ada testimoni masuk.</td>
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
