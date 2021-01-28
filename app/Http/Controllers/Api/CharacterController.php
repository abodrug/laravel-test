<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Models\Character;
use App\Traits\PaginateCollection;
use App\Transformers\CharacterTransformer;

class CharacterController extends Controller
{
    use PaginateCollection;

    public function getCharacters(PaginateRequest $request)
    {
        $characters = Character::when($request->filled('name'), function ($character) use ($request) {
            return $character->where('name', 'LIKE', '%'.$request->get('name').'%');
        })
        ->with(['episodes', 'quotes'])
        ->get();

        if ($characters->count() < 1) {
            return responder()->error('', 'Character not found')->respond(404);
        }

        $characters = $this->paginate($characters);

        return responder()->success($characters, new CharacterTransformer());
    }

    public function getCharacterRandom()
    {
        $character = Character::inRandomOrder()
            ->with(['episodes', 'quotes'])
            ->first();

        return responder()->success($character, new CharacterTransformer());
    }
}
