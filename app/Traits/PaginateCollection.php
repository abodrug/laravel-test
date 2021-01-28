<?php

namespace App\Traits;

use App\Http\Requests\PaginateRequest;
use \Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

/*
 * Paginate the Laravel Collection before and/or after filtering.
 *
 */
trait PaginateCollection
{
    /**
     * Paginate the collection.
     *
     * @param   \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Collection  $collection
     * @param \App\Http\Requests\PaginateRequest $request
     * @return  \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($collection): LengthAwarePaginator
    {
        $perPage = request()->get('limit', 10);
        $currentPage = request()->get('page', 1);


        $otherParams = [
            'path'  => request()->url(),
            'query' => request()->query()
        ];

        return new LengthAwarePaginator(
            $collection->forPage($currentPage , $perPage),
            $collection->count(),
            $perPage,
            Paginator::resolveCurrentPage(),
            $otherParams
        );
    }
}
