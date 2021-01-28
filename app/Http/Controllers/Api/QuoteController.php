<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Models\Quote;
use App\Traits\PaginateCollection;
use App\Transformers\QuoteTransformer;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    use PaginateCollection;

    public function getQuotes(PaginateRequest $request)
    {
        $quotes = $this->paginate(Quote::all());

        return responder()->success($quotes, new QuoteTransformer());
    }

    public function getQuotesRandomByAuthor(Request $request)
    {
        $quote = Quote::whereHas('character', function ($query) use ($request) {
            return $query->where('name', 'LIKE', '%' . $request->get('author') . '%');
        })
            ->inRandomOrder()
            ->first();
        if (!$quote) {
            return responder()->error('', 'Quote by Author not found')->respond(404);
        }

        return responder()->success($quote, new QuoteTransformer());
    }

}
