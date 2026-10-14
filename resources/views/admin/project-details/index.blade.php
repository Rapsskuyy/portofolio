<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Detail Specs</title>
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
            height: 100%;
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
    @if(false)

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
                    <a class="nav-link-custom" href="{{ route('admin.guestbook.index') }}"><i class="fas fa-book"></i> Buku Tamu</a>
                    <a class="nav-link-custom" href="{{ route('admin.coding_projects.index') }}"><i class="fas fa-laptop-code"></i> Project Coding</a>
                    <a class="nav-link-custom" href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper"></i> Blog Posts</a>
                    <a class="nav-link-custom" href="{{ route('admin.mock_apis.index') }}"><i class="fas fa-server"></i> Mock APIs</a>
                    <a class="nav-link-custom active" href="{{ route('admin.project-details.index') }}"><i class="fas fa-layer-group"></i> Detail Specs</a>
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

            <!-- Offcanvas Mobile Drawer -->
            <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="mobileSidebar">
                <div class="offcanvas-header border-bottom border-secondary">
                    <h5 class="offcanvas-title fw-bold">Menu Admin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="nav flex-column">
                        <a class="nav-link-custom" href="{{ route('admin.dashboard') }}"><i class="fas fa-comments"></i> Testimoni</a>
                        <a class="nav-link-custom" href="{{ route('admin.guestbook.index') }}"><i class="fas fa-book"></i> Buku Tamu</a>
                        <a class="nav-link-custom" href="{{ route('admin.coding_projects.index') }}"><i class="fas fa-laptop-code"></i> Project Coding</a>
                        <a class="nav-link-custom" href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper"></i> Blog Posts</a>
                        <a class="nav-link-custom" href="{{ route('admin.mock_apis.index') }}"><i class="fas fa-server"></i> Mock APIs</a>
                        <a class="nav-link-custom active" href="{{ route('admin.project-details.index') }}"><i class="fas fa-layer-group"></i> Detail Specs</a>
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

    @endif
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.sidebar', ['active' => 'project-details'])
            <!-- Main Content -->
            <main class="col-12 col-xl-10 ms-xl-auto main-content">
                <div class="mb-4">
                    <h3 class="fw-bold mb-1">Project Technical Details</h3>
                    <p class="text-secondary small mb-0">Kelola rincian Arsitektur Sistem, Database Schema, dan Snippet Kode untuk modal detail project.</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-20 text-success border-0 rounded-3 mb-4 alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Tutup notifikasi"></button>
                    </div>
                @endif

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @forelse($projects as $project)
                    <div class="col">
                        <div class="card-custom p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="fw-bold mb-1">{{ $project->title }}</h5>
                                        <span class="text-secondary small">{{ $project->year }} · {{ ucfirst($project->category) }}</span>
                                    </div>
                                    @if($project->projectDetail)
                                        <span class="badge bg-success bg-opacity-20 text-success border border-success border-opacity-30 px-2 py-1 rounded-2"><i class="fas fa-check me-1"></i> [VERIFIED] Detail Ada</span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-20 text-secondary border border-secondary border-opacity-30 px-2 py-1 rounded-2">Belum Diisi</span>
                                    @endif
                                </div>
                                
                                @if($project->projectDetail)
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    @if($project->projectDetail->system_architecture) <span class="badge bg-indigo bg-opacity-20 text-indigo border border-indigo border-opacity-20" style="background: rgba(99,102,241,0.15); color: #a5b4fc;">Architecture</span> @endif
                                    @if($project->projectDetail->database_schema) <span class="badge bg-info bg-opacity-20 text-info border border-info border-opacity-20">DB Schema</span> @endif
                                    @if($project->projectDetail->code_snippets) <span class="badge bg-purple bg-opacity-20 text-purple border border-purple border-opacity-20" style="background: rgba(168,85,247,0.15); color: #d8b4fe;">Code Snippet</span> @endif
                                </div>
                                @endif
                            </div>

                            <div class="pt-3 border-top border-secondary border-opacity-20 mt-3">
                                <a href="{{ route('admin.project-details.edit', $project->id) }}" class="btn btn-sm btn-primary px-3 rounded-2" style="background: var(--primary); border: none;">
                                    <i class="fas fa-edit me-1"></i> {{ $project->projectDetail ? 'Edit Technical Specs' : 'Tambah Technical Specs' }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="card-custom p-4 text-center text-secondary">
                            <i class="fas fa-layer-group fa-2x mb-3 d-block opacity-50" aria-hidden="true"></i>
                            Belum ada project coding. Tambahkan project coding terlebih dahulu untuk mengisi detail teknis.
                        </div>
                    </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
