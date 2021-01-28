<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Models\Episode;
use App\Traits\PaginateCollection;
use App\Transformers\EpisodeTransformer;

class EpisodeController extends Controller
{
    use PaginateCollection;

    public function getEpisodes(PaginateRequest $request)
    {
        $episodes = $this->paginate(Episode::all());

        return responder()->success($episodes, new EpisodeTransformer());
    }

    public function getEpisodeById(int $id)
    {
        if ($id < 1) {
            return responder()->error('', 'Bad request')->respond(400);
        }

        $episode = Episode::whereId($id)->with('characters')->first();
        if (!$episode) {
            return responder()->error('', 'Episode not found')->respond(404);
        }
        return responder()->success($episode, new EpisodeTransformer());
    }
}
