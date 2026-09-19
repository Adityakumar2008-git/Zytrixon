<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Content\CaseStudies;
use App\Content\Industries;
use App\Content\Services;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class WorkController extends Controller
{
    public function index(): View
    {
        return view('pages.work.index', [
            'caseStudies' => CaseStudies::all(),
            'industries' => Industries::all(),
        ]);
    }

    public function show(string $slug): View
    {
        $project = CaseStudies::find($slug);

        if (!$project) {
            throw new NotFoundHttpException("Case study not found: {$slug}");
        }

        return view('pages.work.show', [
            'project' => $project,
            'otherProjects' => array_filter(
                CaseStudies::all(),
                fn($item) => $item['slug'] !== $slug
            ),
        ]);
    }
}
