<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Content\CaseStudies;
use App\Content\Industries;
use App\Content\Process;
use App\Content\Services;
use App\Content\Team;
use App\Content\Technologies;
use App\Content\Values;
use Illuminate\View\View;

final class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.home', [
            'services' => Services::all(),
            'caseStudies' => CaseStudies::featured(),
            'process' => Process::all(),
            'technologies' => Technologies::all(),
            'capabilityKeywords' => Technologies::capabilityKeywords(),
            'industries' => Industries::all(),
            'team' => Team::all(),
            'values' => Values::all(),
        ]);
    }
}
