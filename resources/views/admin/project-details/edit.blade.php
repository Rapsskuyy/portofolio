<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project Detail - {{ $codingProject->title }}</title>
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
            margin-bottom: 24px;
            overflow: hidden;
        }

        .card-header-dark {
            background: rgba(15, 23, 42, 0.6);
            border-bottom: 1px solid var(--border-color);
            padding: 16px 24px;
            font-weight: 600;
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

        .code-area {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            background: #0d1117 !important;
            color: #a5b4fc !important;
        }

        .schema-row, .snippet-row {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
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
            @include('admin.partials.sidebar', ['active' => 'coding-projects'])
            <!-- Main Content Area -->
            <main class="col-12 col-xl-10 ms-xl-auto main-content">
                <div class="admin-page-header mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('admin.coding_projects.index') }}" class="btn btn-outline-light btn-sm rounded-2">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <h3 class="fw-bold mb-0">{{ $codingProject->title }}</h3>
                    </div>
                    <span class="badge bg-indigo bg-opacity-20 text-indigo border border-indigo px-3 py-2 rounded-2" style="background: rgba(99,102,241,0.15); color: #a5b4fc;">
                        {{ $codingProject->year }} · {{ ucfirst($codingProject->category) }}
                    </span>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger bg-danger bg-opacity-20 text-danger border-0 rounded-3 mb-4">
                        <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('admin.project-details.update', $codingProject->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- System Architecture -->
                    <div class="card-custom">
                        <div class="card-header-dark text-indigo d-flex align-items-center gap-2">
                            <i class="fas fa-project-diagram"></i> System Architecture
                        </div>
                        <div class="p-4">
                            <p class="text-secondary small mb-3">Jelaskan alur sistem project ini (Client → Controller → Model → Database → Response).</p>
                            <textarea name="system_architecture" class="form-control" rows="5" placeholder="1. User membuka halaman&#10;2. Request dikirim ke Backend Controller...">{{ old('system_architecture', $detail->system_architecture ?? '') }}</textarea>
                        </div>
                    </div>

                    <!-- Database Schema -->
                    <div class="card-custom">
                        <div class="card-header-dark d-flex justify-content-between align-items-center">
                            <span class="text-success"><i class="fas fa-database me-2"></i>Database Schema</span>
                            <button type="button" class="btn btn-sm btn-outline-success rounded-2" onclick="addSchemaRow()">+ Tambah Tabel</button>
                        </div>
                        <div class="p-4">
                            <p class="text-secondary small mb-3">Tambahkan tabel-tabel database yang digunakan dalam project ini.</p>
                            <div id="schema-container">
                                @php
                                    $schemas = old('database_schema', $detail->database_schema ?? []);
                                    if (is_string($schemas)) $schemas = json_decode($schemas, true) ?? [];
                                @endphp
                                @forelse($schemas as $i => $schema)
                                <div class="schema-row" id="schema-{{ $i }}">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-4">
                                            <input type="text" name="database_schema[{{ $i }}][table]" class="form-control" placeholder="Nama tabel" value="{{ $schema['table'] ?? '' }}">
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" name="database_schema[{{ $i }}][columns]" class="form-control" placeholder="Kolom: id, name, email, created_at, ..." value="{{ $schema['columns'] ?? '' }}">
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <button type="button" class="btn btn-outline-danger admin-remove-row" onclick="removeRow('schema-{{ $i }}')" aria-label="Hapus tabel database"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="schema-row" id="schema-0">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-4">
                                            <input type="text" name="database_schema[0][table]" class="form-control" placeholder="Nama tabel">
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" name="database_schema[0][columns]" class="form-control" placeholder="Kolom: id, name, email, created_at, ...">
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <button type="button" class="btn btn-outline-danger admin-remove-row" onclick="removeRow('schema-0')" aria-label="Hapus tabel database"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Code Snippets -->
                    <div class="card-custom">
                        <div class="card-header-dark d-flex justify-content-between align-items-center">
                            <span class="text-warning"><i class="fas fa-code me-2"></i>Code Snippets</span>
                            <button type="button" class="btn btn-sm btn-outline-warning rounded-2" onclick="addSnippetRow()">+ Tambah Snippet</button>
                        </div>
                        <div class="p-4">
                            <p class="text-secondary small mb-3">Tambahkan cuplikan kode backend terbaik Anda.</p>
                            <div id="snippet-container">
                                @php
                                    $snippets = old('code_snippets', $detail->code_snippets ?? []);
                                    if (is_string($snippets)) $snippets = json_decode($snippets, true) ?? [];
                                @endphp
                                @forelse($snippets as $j => $snippet)
                                <div class="snippet-row" id="snippet-{{ $j }}">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-6">
                                            <input type="text" name="code_snippets[{{ $j }}][title]" class="form-control" placeholder="Judul snippet (e.g: Auth Middleware)" value="{{ $snippet['title'] ?? '' }}">
                                        </div>
                                        <div class="col-md-5">
                                            <select name="code_snippets[{{ $j }}][language]" class="form-select">
                                                <option value="php" {{ ($snippet['language'] ?? '') == 'php' ? 'selected' : '' }}>PHP</option>
                                                <option value="javascript" {{ ($snippet['language'] ?? '') == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                                                <option value="sql" {{ ($snippet['language'] ?? '') == 'sql' ? 'selected' : '' }}>SQL</option>
                                                <option value="kotlin" {{ ($snippet['language'] ?? '') == 'kotlin' ? 'selected' : '' }}>Kotlin</option>
                                                <option value="java" {{ ($snippet['language'] ?? '') == 'java' ? 'selected' : '' }}>Java</option>
                                                <option value="html" {{ ($snippet['language'] ?? '') == 'html' ? 'selected' : '' }}>HTML</option>
                                                <option value="css" {{ ($snippet['language'] ?? '') == 'css' ? 'selected' : '' }}>CSS</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <button type="button" class="btn btn-outline-danger admin-remove-row" onclick="removeRow('snippet-{{ $j }}')" aria-label="Hapus code snippet"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippets[{{ $j }}][code]" class="form-control code-area" rows="6" placeholder="Paste kode di sini...">{{ $snippet['code'] ?? '' }}</textarea>
                                </div>
                                @empty
                                <div class="snippet-row" id="snippet-0">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-6">
                                            <input type="text" name="code_snippets[0][title]" class="form-control" placeholder="Judul snippet (e.g: Auth Middleware)">
                                        </div>
                                        <div class="col-md-5">
                                            <select name="code_snippets[0][language]" class="form-select">
                                                <option value="php">PHP</option>
                                                <option value="javascript">JavaScript</option>
                                                <option value="sql">SQL</option>
                                                <option value="kotlin">Kotlin</option>
                                                <option value="java">Java</option>
                                                <option value="html">HTML</option>
                                                <option value="css">CSS</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <button type="button" class="btn btn-outline-danger admin-remove-row" onclick="removeRow('snippet-0')" aria-label="Hapus code snippet"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippets[0][code]" class="form-control code-area" rows="6" placeholder="Paste kode di sini..."></textarea>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Technical Specs -->
                    <div class="card-custom">
                        <div class="card-header-dark text-info"><i class="fas fa-cogs me-2"></i>Technical Specs</div>
                        <div class="p-4">
                            <p class="text-secondary small mb-3">Info teknis tambahan: server, dependencies khusus, dll.</p>
                            <textarea name="technical_specs" class="form-control" rows="4" placeholder="- PHP 8.2 + Laravel 11&#10;- SQLite / MySQL Database">{{ old('technical_specs', $detail->technical_specs ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-2 admin-form-actions">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3" style="background: var(--primary); border: none;"><i class="fas fa-save me-2"></i>Simpan Technical Details</button>
                        <a href="{{ route('admin.coding_projects.index') }}" class="btn btn-outline-light px-4 py-2 rounded-3">Batal</a>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let schemaCount = {{ count($schemas ?? []) }};
        let snippetCount = {{ count($snippets ?? []) }};

        function addSchemaRow() {
            const container = document.getElementById('schema-container');
            const div = document.createElement('div');
            div.className = 'schema-row';
            div.id = 'schema-' + schemaCount;
            div.innerHTML = `
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="database_schema[${schemaCount}][table]" class="form-control" placeholder="Nama tabel">
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="database_schema[${schemaCount}][columns]" class="form-control" placeholder="Kolom: id, name, email, ...">
                    </div>
                    <div class="col-md-1 text-end">
                        <button type="button" class="btn btn-outline-danger admin-remove-row" onclick="removeRow('schema-${schemaCount}')" aria-label="Hapus tabel database"><i class="fas fa-trash" aria-hidden="true"></i></button>
                    </div>
                </div>`;
            container.appendChild(div);
            schemaCount++;
        }

        function addSnippetRow() {
            const container = document.getElementById('snippet-container');
            const div = document.createElement('div');
            div.className = 'snippet-row';
            div.id = 'snippet-' + snippetCount;
            div.innerHTML = `
                <div class="row g-2 mb-2">
                    <div class="col-md-6">
                        <input type="text" name="code_snippets[${snippetCount}][title]" class="form-control" placeholder="Judul snippet">
                    </div>
                    <div class="col-md-5">
                        <select name="code_snippets[${snippetCount}][language]" class="form-select">
                            <option value="php">PHP</option>
                            <option value="javascript">JavaScript</option>
                            <option value="sql">SQL</option>
                            <option value="kotlin">Kotlin</option>
                            <option value="java">Java</option>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                        </select>
                    </div>
                    <div class="col-md-1 text-end">
                        <button type="button" class="btn btn-outline-danger admin-remove-row" onclick="removeRow('snippet-${snippetCount}')" aria-label="Hapus code snippet"><i class="fas fa-trash" aria-hidden="true"></i></button>
                    </div>
                </div>
                <textarea name="code_snippets[${snippetCount}][code]" class="form-control code-area" rows="6" placeholder="Paste kode di sini..."></textarea>`;
            container.appendChild(div);
            snippetCount++;
        }

        function removeRow(id) {
            const el = document.getElementById(id);
            if (el) el.remove();
        }
    </script>
</body>
</html>
