<div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-labelledby="editProjectLabel{{ $project->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content modal-content-dark">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column flex-grow-1 overflow-hidden" style="min-height: 0;">
                @csrf
                @method('PUT')
                <div class="modal-header modal-header-dark flex-shrink-0">
                    <h2 class="modal-title h5 fw-bold" id="editProjectLabel{{ $project->id }}">Edit Item Galeri: {{ $project->title }}</h2>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup form edit galeri"></button>
                </div>
                <div class="modal-body p-4" style="overflow-y: auto; max-height: calc(100dvh - 12rem);">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small text-secondary">Judul Item / Event</label>
                            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small text-secondary">Urutan Tampil</label>
                            <input type="number" name="order" class="form-control" value="{{ $project->order }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label small text-secondary">Deskripsi Ringkas</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ $project->description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-secondary">Ganti Gambar (Upload File)</label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                            <small class="text-secondary">Maksimal 5MB (JPG, PNG, WebP). Kosongkan jika tidak diubah.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-secondary">Atau URL Gambar Eksternal</label>
                            <input type="text" name="image_url" class="form-control" value="{{ $project->image_url }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-secondary">Link Project (Opsional)</label>
                            <input type="url" name="project_url" class="form-control" value="{{ $project->project_url }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-secondary">Link GitHub (Opsional)</label>
                            <input type="url" name="github_url" class="form-control" value="{{ $project->github_url }}">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_visible" value="1" id="visibleCheck{{ $project->id }}" {{ $project->is_visible ? 'checked' : '' }}>
                                <label class="form-check-label" for="visibleCheck{{ $project->id }}">Tampilkan di website publik</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-dark flex-shrink-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" style="background: var(--primary); border: none;">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
