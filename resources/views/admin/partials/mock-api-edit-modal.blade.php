<div class="modal fade" id="editModal{{ $api->id }}" tabindex="-1" aria-labelledby="editApiLabel{{ $api->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content modal-content-dark">
            <div class="modal-header modal-header-dark">
                <h2 class="modal-title h5 fw-bold admin-break-text" id="editApiLabel{{ $api->id }}">Edit API: /api/v1/{{ $api->path }}</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup form edit API"></button>
            </div>
            <form action="{{ route('admin.mock_apis.update', $api->id) }}" method="POST" class="d-flex flex-column flex-grow-1 overflow-hidden" style="min-height: 0;">
                @csrf @method('PUT')
                <div class="modal-body p-4" style="overflow-y: auto; max-height: calc(100dvh - 12rem);">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">HTTP Method</label>
                            <select name="method" class="form-select">
                                <option value="GET" {{ $api->method === 'GET' ? 'selected' : '' }}>GET</option>
                                <option value="POST" {{ $api->method === 'POST' ? 'selected' : '' }}>POST</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Endpoint Path (setelah /api/v1/)</label>
                            <input type="text" name="path" class="form-control" value="{{ $api->path }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi Endpoint</label>
                            <input type="text" name="description" class="form-control" value="{{ $api->description }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Response JSON Payload</label>
                            <textarea name="response_body" class="form-control text-monospace" rows="6" required>{{ is_array($api->response_body) ? json_encode($api->response_body, JSON_PRETTY_PRINT) : $api->response_body }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="activeCheck{{ $api->id }}" {{ $api->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="activeCheck{{ $api->id }}">Aktifkan Endpoint Ini</label>
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
