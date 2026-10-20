<div class="mb-3">
    <label for="skillName{{ $skill?->id ?? 'new' }}" class="form-label">Nama Skill</label>
    <input type="text" name="name" id="skillName{{ $skill?->id ?? 'new' }}" class="form-control" value="{{ old('name', $skill?->name) }}" placeholder="Contoh: Laravel atau Communication" maxlength="100" required>
</div>
<div class="row g-3">
    <div class="col-sm-7">
        <label for="skillType{{ $skill?->id ?? 'new' }}" class="form-label">Tipe Skill</label>
        <select name="type" id="skillType{{ $skill?->id ?? 'new' }}" class="form-select" required>
            <option value="soft" @selected(old('type', $skill?->type) === 'soft')>Soft Skill</option>
            <option value="hard" @selected(old('type', $skill?->type ?? 'hard') === 'hard')>Technical Skill</option>
        </select>
    </div>
    <div class="col-sm-5">
        <label for="skillProficiency{{ $skill?->id ?? 'new' }}" class="form-label">Proficiency (%)</label>
        <input type="number" name="proficiency" id="skillProficiency{{ $skill?->id ?? 'new' }}" class="form-control" value="{{ old('proficiency', $skill?->proficiency ?? 50) }}" min="0" max="100" required>
    </div>
</div>
