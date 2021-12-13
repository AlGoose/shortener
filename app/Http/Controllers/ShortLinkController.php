<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkPostRequest;
use App\Models\ShortLink;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function create(ShortLinkPostRequest $request)
    {
        $shortLink = ShortLink::create([
            'source_link' => $request->source_link,
            'code' => !is_null($request->code) ? $request->code : Str::random(8),
            'type' => $request->type,
            'stats_link' => Str::random(10),
            'expiry_date' => Carbon::now()->addDays($request->days),
        ]);

        return redirect('/')->with(['status' => 'Сокращенная ссылка создана!', 'short_link' => 'http://shortener.test/' . $shortLink->code, 'stats_link' => 'http://shortener.test/stats/' . $shortLink->stats_link]);
    }

    public function open(Request $request, string $code)
    {
        $shortLink = ShortLink::where('code', $code)->first();
        if (is_null($shortLink) || (!is_null($shortLink->expiry_date) && strtotime($shortLink->expiry_date) < time())) {
            abort(404);
        }

        $view = View::create([
            'client_ip' => $request->ip(),
        ]);
        $view->shortLink()->associate($shortLink)->save();

        if ($shortLink->type == 'commercial') {
            $pictures = Storage::disk('public')->files('/ads');
            $picture = $pictures[array_rand($pictures)];
            $view->picture = basename($picture);
            $view->save();

            return view('pages/advertising')->with(['source_link' => $shortLink->source_link, 'picture_url' => Storage::url($picture)]);
        }

        return redirect($shortLink->source_link);
    }
}
