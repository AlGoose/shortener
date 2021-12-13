<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\View;
use Carbon\Carbon;

class StatsController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::get();
        $views = View::get();
        $from = Carbon::now()->subDays(14);
        $to = Carbon::now();

        $res = (object)[
            'totalLinks' => $shortLinks->count(),
            'totalNormalLinks' => $shortLinks->where('type', 'normal')->count(),
            'totalCommercialLinks' => $shortLinks->where('type', 'commercial')->count(),
            'totalViews' => $views->count(),
            'totalUniqueUsers' => $views->whereBetween('created_at', [$from, $to])->groupBy('client_ip')->count()
        ];

        return view('pages/stats')->with(['res' => $res]);
    }

    public function showСertainStats(string $stats_link)
    {
        $shortLink = ShortLink::where('stats_link', $stats_link)->first();
        if (is_null($shortLink)) {
            abort(404);
        }

        $views = $shortLink->views()->orderBy('created_at', 'desc')->get();
        return view('pages/certain_stats')->with(['short_link' => 'http://shortener.test/' . $shortLink->code, 'views' => $views]);
    }
}
