<div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1" aria-labelledby="editPostLabel{{ $post->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content modal-content-dark">
            <div class="modal-header modal-header-dark">
                <h2 class="modal-title h5 fw-bold" id="editPostLabel{{ $post->id }}">Edit Artikel: {{ $post->title }}</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup form edit artikel"></button>
            </div>
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="d-flex flex-column flex-grow-1 overflow-hidden" style="min-height: 0;">
                @csrf @method('PUT')
                <div class="modal-body p-4" style="overflow-y: auto; max-height: calc(100dvh - 12rem);">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="category" class="form-control" value="{{ $post->category }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Konten Artikel</label>
                            <textarea name="content" class="form-control summernote" rows="8" required>{!! $post->content !!}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_published" value="1" id="publishCheck{{ $post->id }}" {{ $post->is_published ? 'checked' : '' }}>
                                <label class="form-check-label" for="publishCheck{{ $post->id }}">Publikasikan Langsung</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-dark flex-shrink-0">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
