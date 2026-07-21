<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #212529; color: white; padding: 20px; }
        .main-content { padding: 30px; }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); }
        .has-detail { border-left: 4px solid #198754; }
        .no-detail { border-left: 4px solid #dee2e6; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <h4 class="mb-4">Admin Raffa</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white-50" href="{{ route('admin.dashboard', ['key'=>'raffa']) }}"><i class="fas fa-comments me-2"></i> Testimoni</a></li>
                <li class="nav-item"><a class="nav-link text-white-50" href="{{ route('admin.guestbook.index', ['key'=>'raffa']) }}"><i class="fas fa-book me-2"></i> Buku Tamu</a></li>
                <li class="nav-item"><a class="nav-link text-white-50" href="{{ route('admin.coding_projects.index', ['key'=>'raffa']) }}"><i class="fas fa-laptop-code me-2"></i> Project Coding</a></li>
                <li class="nav-item"><a class="nav-link text-white active" href="{{ route('admin.project-details.index', ['key'=>'raffa']) }}"><i class="fas fa-layer-group me-2"></i> Project Details</a></li>
                <li class="nav-item"><a class="nav-link text-white-50" href="{{ route('admin.posts.index', ['key'=>'raffa']) }}"><i class="fas fa-newspaper me-2"></i> Blog Posts</a></li>
                <li class="nav-item"><a class="nav-link text-white-50" href="{{ route('admin.mock_apis.index', ['key'=>'raffa']) }}"><i class="fas fa-server me-2"></i> Mock APIs</a></li>
                <li class="nav-item mt-4"><a class="nav-link text-white-50" href="{{ route('portfolio.index') }}"><i class="fas fa-external-link-alt me-2"></i> Lihat Web</a></li>
            </ul>
        </nav>

        <main class="col-md-10 ms-sm-auto main-content">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Project Details</h1>
                <span class="text-muted">Klik "Edit" untuk tambah detail modal setiap project</span>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="row row-cols-1 row-cols-md-2 g-3">
                @foreach($projects as $project)
                <div class="col">
                    <div class="card h-100 {{ $project->projectDetail ? 'has-detail' : 'no-detail' }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="card-title mb-1">{{ $project->title }}</h6>
                                    <small class="text-muted">{{ $project->year }} · {{ ucfirst($project->category) }}</small>
                                </div>
                                @if($project->projectDetail)
                                    <span class="badge bg-success">✓ Detail Ada</span>
                                @else
                                    <span class="badge bg-secondary">Belum diisi</span>
                                @endif
                            </div>
                            @if($project->projectDetail)
                            <div class="mt-2">
                                <small class="text-muted">
                                    @if($project->projectDetail->system_architecture) <span class="badge bg-light text-dark me-1">Architecture</span> @endif
                                    @if($project->projectDetail->database_schema) <span class="badge bg-light text-dark me-1">DB Schema</span> @endif
                                    @if($project->projectDetail->code_snippets) <span class="badge bg-light text-dark me-1">Code Snippet</span> @endif
                                </small>
                            </div>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('admin.project-details.edit', [$project, 'key'=>'raffa']) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit me-1"></i> {{ $project->projectDetail ? 'Edit Detail' : 'Tambah Detail' }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
