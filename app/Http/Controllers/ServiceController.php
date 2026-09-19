<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Content\CaseStudies;
use App\Content\Process;
use App\Content\Services;
use App\Content\Technologies;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class ServiceController extends Controller
{
    public function index(): View
    {
        return view('pages.services.index', [
            'services' => Services::all(),
            'process' => Process::all(),
            'technologies' => Technologies::all(),
        ]);
    }

    public function show(string $slug): View
    {
        $service = Services::find($slug);

        if (!$service) {
            throw new NotFoundHttpException("Service not found: {$slug}");
        }

        return view('pages.services.show', [
            'service' => $service,
            'relatedWork' => CaseStudies::all(),
            'process' => Process::all(),
            'technologies' => Technologies::all(),
        ]);
    }
}
