<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project Detail - {{ $codingProject->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #212529; color: white; padding: 20px; }
        .main-content { padding: 30px; }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); }
        textarea.code-area { font-family: 'Courier New', monospace; font-size: 13px; background: #1e1e1e; color: #d4d4d4; }
        .schema-row { background: #f8f9fa; border-radius: 8px; padding: 12px; margin-bottom: 8px; }
        .snippet-row { background: #f8f9fa; border-radius: 8px; padding: 12px; margin-bottom: 8px; }
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
                <div>
                    <a href="{{ route('admin.project-details.index', ['key'=>'raffa']) }}" class="btn btn-sm btn-outline-secondary me-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <h1 class="h2 d-inline">{{ $codingProject->title }}</h1>
                </div>
                <span class="badge bg-primary">{{ $codingProject->year }} · {{ ucfirst($codingProject->category) }}</span>
            </div>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
            @endif

            <form action="{{ route('admin.project-details.update', [$codingProject, 'key'=>'raffa']) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- System Architecture -->
                <div class="card mb-4">
                    <div class="card-header bg-white fw-bold"><i class="fas fa-project-diagram text-primary me-2"></i>System Architecture</div>
                    <div class="card-body">
                        <p class="text-muted small">Jelaskan alur sistem project ini. Contoh: Client → Request → Controller → Model → Database → Response</p>
                        <textarea name="system_architecture" class="form-control" rows="5" placeholder="Contoh:&#10;1. User membuka halaman&#10;2. Browser mengirim request ke Controller&#10;3. Controller memproses data dari Model&#10;4. Data dikembalikan ke View&#10;5. User melihat hasilnya">{{ old('system_architecture', $detail->system_architecture ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Database Schema -->
                <div class="card mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-database text-success me-2"></i>Database Schema</span>
                        <button type="button" class="btn btn-sm btn-outline-success" onclick="addSchemaRow()">+ Tambah Tabel</button>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">Tambahkan tabel-tabel database yang digunakan dalam project ini.</p>
                        <div id="schema-container">
                            @php
                                $schemas = old('database_schema', $detail->database_schema ?? []);
                                if (is_string($schemas)) $schemas = json_decode($schemas, true) ?? [];
                            @endphp
                            @forelse($schemas as $i => $schema)
                            <div class="schema-row" id="schema-{{ $i }}">
                                <div class="row g-2 align-items-start">
                                    <div class="col-md-3">
                                        <input type="text" name="database_schema[{{ $i }}][table]" class="form-control form-control-sm" placeholder="Nama tabel" value="{{ $schema['table'] ?? '' }}">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="database_schema[{{ $i }}][columns]" class="form-control form-control-sm" placeholder="Kolom: id, name, email, created_at, ..." value="{{ $schema['columns'] ?? '' }}">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow('schema-{{ $i }}')"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="schema-row" id="schema-0">
                                <div class="row g-2 align-items-start">
                                    <div class="col-md-3">
                                        <input type="text" name="database_schema[0][table]" class="form-control form-control-sm" placeholder="Nama tabel">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="database_schema[0][columns]" class="form-control form-control-sm" placeholder="Kolom: id, name, email, created_at, ...">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow('schema-0')"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Code Snippets -->
                <div class="card mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-code text-warning me-2"></i>Code Snippets</span>
                        <button type="button" class="btn btn-sm btn-outline-warning" onclick="addSnippetRow()">+ Tambah Snippet</button>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">Tambahkan cuplikan kode backend terbaik kamu.</p>
                        <div id="snippet-container">
                            @php
                                $snippets = old('code_snippets', $detail->code_snippets ?? []);
                                if (is_string($snippets)) $snippets = json_decode($snippets, true) ?? [];
                            @endphp
                            @forelse($snippets as $j => $snippet)
                            <div class="snippet-row" id="snippet-{{ $j }}">
                                <div class="row g-2 mb-2">
                                    <div class="col-md-6">
                                        <input type="text" name="code_snippets[{{ $j }}][title]" class="form-control form-control-sm" placeholder="Judul snippet (e.g: Auth Middleware)" value="{{ $snippet['title'] ?? '' }}">
                                    </div>
                                    <div class="col-md-5">
                                        <select name="code_snippets[{{ $j }}][language]" class="form-select form-select-sm">
                                            <option value="php" {{ ($snippet['language'] ?? '') == 'php' ? 'selected' : '' }}>PHP</option>
                                            <option value="javascript" {{ ($snippet['language'] ?? '') == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                                            <option value="sql" {{ ($snippet['language'] ?? '') == 'sql' ? 'selected' : '' }}>SQL</option>
                                            <option value="kotlin" {{ ($snippet['language'] ?? '') == 'kotlin' ? 'selected' : '' }}>Kotlin</option>
                                            <option value="java" {{ ($snippet['language'] ?? '') == 'java' ? 'selected' : '' }}>Java</option>
                                            <option value="html" {{ ($snippet['language'] ?? '') == 'html' ? 'selected' : '' }}>HTML</option>
                                            <option value="css" {{ ($snippet['language'] ?? '') == 'css' ? 'selected' : '' }}>CSS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow('snippet-{{ $j }}')"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <textarea name="code_snippets[{{ $j }}][code]" class="form-control code-area" rows="6" placeholder="Paste code di sini...">{{ $snippet['code'] ?? '' }}</textarea>
                            </div>
                            @empty
                            <div class="snippet-row" id="snippet-0">
                                <div class="row g-2 mb-2">
                                    <div class="col-md-6">
                                        <input type="text" name="code_snippets[0][title]" class="form-control form-control-sm" placeholder="Judul snippet (e.g: Auth Middleware)">
                                    </div>
                                    <div class="col-md-5">
                                        <select name="code_snippets[0][language]" class="form-select form-select-sm">
                                            <option value="php">PHP</option>
                                            <option value="javascript">JavaScript</option>
                                            <option value="sql">SQL</option>
                                            <option value="kotlin">Kotlin</option>
                                            <option value="java">Java</option>
                                            <option value="html">HTML</option>
                                            <option value="css">CSS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow('snippet-0')"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <textarea name="code_snippets[0][code]" class="form-control code-area" rows="6" placeholder="Paste code di sini..."></textarea>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Technical Specs -->
                <div class="card mb-4">
                    <div class="card-header bg-white fw-bold"><i class="fas fa-cogs text-info me-2"></i>Technical Specs</div>
                    <div class="card-body">
                        <p class="text-muted small">Info teknis tambahan: server, hosting, dependencies khusus, dll.</p>
                        <textarea name="technical_specs" class="form-control" rows="4" placeholder="Contoh:&#10;- PHP 8.2 + Laravel 11&#10;- MySQL 8.0&#10;- Hosted on localhost (Laragon)&#10;- Menggunakan JWT Authentication">{{ old('technical_specs', $detail->technical_specs ?? '') }}</textarea>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Simpan Detail</button>
                    <a href="{{ route('admin.project-details.index', ['key'=>'raffa']) }}" class="btn btn-outline-secondary">Batal</a>
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
        <div class="row g-2 align-items-start">
            <div class="col-md-3">
                <input type="text" name="database_schema[${schemaCount}][table]" class="form-control form-control-sm" placeholder="Nama tabel">
            </div>
            <div class="col-md-8">
                <input type="text" name="database_schema[${schemaCount}][columns]" class="form-control form-control-sm" placeholder="Kolom: id, name, email, ...">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow('schema-${schemaCount}')"><i class="fas fa-times"></i></button>
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
                <input type="text" name="code_snippets[${snippetCount}][title]" class="form-control form-control-sm" placeholder="Judul snippet">
            </div>
            <div class="col-md-5">
                <select name="code_snippets[${snippetCount}][language]" class="form-select form-select-sm">
                    <option value="php">PHP</option>
                    <option value="javascript">JavaScript</option>
                    <option value="sql">SQL</option>
                    <option value="kotlin">Kotlin</option>
                    <option value="java">Java</option>
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow('snippet-${snippetCount}')"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <textarea name="code_snippets[${snippetCount}][code]" class="form-control code-area" rows="6" placeholder="Paste code di sini..."></textarea>`;
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
