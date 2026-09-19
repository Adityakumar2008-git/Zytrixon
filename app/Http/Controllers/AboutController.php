<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Content\Careers;
use App\Content\Insights;
use App\Content\Site;
use App\Content\Team;
use App\Content\Values;
use Illuminate\View\View;

final class AboutController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.about', [
            'team' => Team::all(),
            'values' => Values::all(),
            'careers' => Careers::all(),
            'insights' => Insights::recent(3),
        ]);
    }
}
