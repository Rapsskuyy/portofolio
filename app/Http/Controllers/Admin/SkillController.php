<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Services\PublicSitePublisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    public function __construct(private readonly PublicSitePublisher $publisher) {}

    public function index(): View
    {
        $skills = Skill::orderBy('type')->orderBy('name')->get();

        return view('admin.skills', compact('skills'));
    }

    public function store(Request $request): RedirectResponse
    {
        Skill::create($this->validated($request));

        return redirect()->route('admin.skills.index')->with('success', $this->publisher->markUnpublished());
    }

    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $skill->update($this->validated($request));

        return redirect()->route('admin.skills.index')->with('success', $this->publisher->markUnpublished());
    }

    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', $this->publisher->markUnpublished());
    }

    /** @return array{name: string, type: string, proficiency: int} */
    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:soft,hard',
            'proficiency' => 'required|integer|min:0|max:100',
        ]);
    }
}
