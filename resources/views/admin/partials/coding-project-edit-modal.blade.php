<div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-labelledby="editCodingProjectLabel{{ $project->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content modal-content-dark">
            <div class="modal-header modal-header-dark">
                <h2 class="modal-title h5 fw-bold" id="editCodingProjectLabel{{ $project->id }}"><i class="fas fa-edit text-primary me-2" aria-hidden="true"></i>Edit Project: {{ $project->title }}</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup form edit project"></button>
            </div>
            <form action="{{ route('admin.coding_projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column flex-grow-1 overflow-hidden" style="min-height: 0;">
                @csrf
                @method('PUT')
                <div class="modal-body p-4" style="overflow-y: auto; max-height: calc(100dvh - 12rem);">
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
                        <div class="col-md-6">
                            <label class="form-label"><i class="fas fa-upload me-1 text-info" aria-hidden="true"></i> Upload Gambar (Dari Explorer Computer)</label>
                            <input type="file" name="image_file" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">
                            <small class="text-secondary">Pilih file image (PNG, JPG, GIF, atau WEBP) maks 5MB.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Atau Path/URL Gambar Manual</label>
                            <input type="text" name="image_url" class="form-control" value="{{ $project->image_url }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Live Demo URL</label>
                            <input type="url" name="demo_url" class="form-control" value="{{ $project->demo_url }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">GitHub Repository URL</label>
                            <input type="url" name="github_url" class="form-control" value="{{ $project->github_url }}">
                        </div>
                        <div class="col-12"><hr class="my-2 border-secondary"></div>
                        <div class="col-12"><h3 class="h6 fw-bold text-indigo"><i class="fas fa-code me-2" aria-hidden="true"></i>Spesifikasi Teknis Backend</h3></div>
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
                            <textarea name="code_snippet" class="form-control text-monospace" rows="4">{{ $project->code_snippet }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-dark flex-shrink-0">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1" aria-hidden="true"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
