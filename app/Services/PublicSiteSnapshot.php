<?php

namespace App\Services;

use App\Models\CodingProject;
use App\Models\Education;
use App\Models\MockApi;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Support\Collection;

class PublicSiteSnapshot
{
    /**
     * Return only the records that are intended for an anonymous visitor.
     * Private submissions and all administrator-only fields stay out of this
     * payload because it is copied into a static deployment.
     *
     * @return array<string, mixed>
     */
    public function data(): array
    {
        $educations = Education::query()->orderBy('id')->get();
        $softSkills = Skill::query()->where('type', 'soft')->orderBy('id')->get();
        $hardSkills = Skill::query()->where('type', 'hard')->orderBy('id')->get();
        $projects = Project::query()->visible()->orderBy('order')->orderBy('id')->get();
        $codingProjects = CodingProject::query()->with('projectDetail')->orderBy('order')->orderByDesc('year')->get();
        $testimonials = Testimonial::query()->whereRaw('is_approved IS TRUE')->latest()->take(6)->get();
        $posts = Post::query()->whereRaw('is_published IS TRUE')->latest()->get();
        $mockApis = MockApi::query()->whereRaw('is_active IS TRUE')->orderBy('id')->get();

        return [
            'educations' => $educations->map(fn (Education $education) => [
                'institution' => $education->institution,
                'degree' => $education->degree,
                'field_of_study' => $education->field_of_study,
                'start_year' => $education->start_year,
                'end_year' => $education->end_year,
                'description' => $education->description,
            ])->values()->all(),
            'skills' => [
                'soft' => $this->skills($softSkills),
                'hard' => $this->skills($hardSkills),
            ],
            'projects' => $projects->map(fn (Project $project) => [
                'title' => $project->title,
                'description' => $project->description,
                'image_url' => $project->formatted_image_url,
                'project_url' => $project->project_url,
                'github_url' => $project->github_url,
                'technologies' => $project->getTechnologiesArray(),
                'order' => $project->order,
            ])->values()->all(),
            'coding_projects' => $codingProjects->map(fn (CodingProject $project) => [
                'title' => $project->title,
                'description' => $project->description,
                'image_url' => $project->formatted_image_url,
                'demo_url' => $project->demo_url,
                'github_url' => $project->github_url,
                'technologies' => $project->getTechnologiesArray(),
                'category' => $project->category,
                'year' => $project->year,
                'order' => $project->order,
                'type' => $project->type,
                'architecture_diagram' => $project->architecture_diagram,
                'database_schema' => $project->database_schema,
                'code_snippet' => $project->code_snippet,
                'project_detail' => $project->projectDetail ? [
                    'system_architecture' => $project->projectDetail->system_architecture,
                    'database_schema' => $project->projectDetail->database_schema,
                    'code_snippets' => $project->projectDetail->code_snippets,
                    'technical_specs' => $project->projectDetail->technical_specs,
                ] : null,
            ])->values()->all(),
            'testimonials' => $testimonials->map(fn (Testimonial $testimonial) => [
                'name' => $testimonial->name,
                'position' => $testimonial->position,
                'message' => $testimonial->message,
                'rating' => $testimonial->rating,
                'image_url' => $testimonial->image_url,
                'created_at' => optional($testimonial->created_at)->toIso8601String(),
            ])->values()->all(),
            'posts' => $posts->map(fn (Post $post) => [
                'title' => $post->title,
                'slug' => $post->slug,
                'category' => $post->category,
                'excerpt' => $post->excerpt,
                'safe_content' => $post->safe_content,
                'published_at' => optional($post->created_at)->toIso8601String(),
            ])->values()->all(),
            'mock_apis' => $mockApis->map(fn (MockApi $mockApi) => [
                'path' => $mockApi->path,
                'method' => $mockApi->method,
                'description' => $mockApi->description,
                'response_body' => $mockApi->response_body,
            ])->values()->all(),
        ];
    }

    /** @return array<int, array{name: mixed, proficiency: mixed}> */
    private function skills(Collection $skills): array
    {
        return $skills->map(fn (Skill $skill) => [
            'name' => $skill->name,
            'proficiency' => $skill->proficiency,
        ])->values()->all();
    }

    /** @return array<string, string> */
    public function renderedPages(): array
    {
        $educations = Education::query()->orderBy('id')->get();
        $softSkills = Skill::query()->where('type', 'soft')->orderBy('id')->get();
        $hardSkills = Skill::query()->where('type', 'hard')->orderBy('id')->get();
        $projects = Project::query()->visible()->orderBy('order')->orderBy('id')->get();
        $codingProjects = CodingProject::query()->with('projectDetail')->orderBy('order')->orderByDesc('year')->get();
        $testimonials = Testimonial::query()->whereRaw('is_approved IS TRUE')->latest()->take(6)->get();
        $posts = Post::query()->whereRaw('is_published IS TRUE')->latest()->get();
        $mockApis = MockApi::query()->whereRaw('is_active IS TRUE')->orderBy('id')->get();

        return [
            '/' => view('portfolio.index', compact('educations', 'softSkills', 'hardSkills', 'projects', 'codingProjects'))->render(),
            '/portfolio' => view('portfolio.index', compact('educations', 'softSkills', 'hardSkills', 'projects', 'codingProjects'))->render(),
            '/about' => view('portfolio.about', compact('educations'))->render(),
            '/skills' => view('portfolio.skills', compact('softSkills', 'hardSkills'))->render(),
            '/experience' => view('portfolio.experience', compact('projects', 'codingProjects'))->render(),
            '/guestbook' => view('portfolio.guestbook', compact('testimonials', 'posts', 'mockApis'))->render(),
        ];
    }
}
