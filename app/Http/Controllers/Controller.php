<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $data
     * @param $status
     * @author João Pedro B Santos
     * @return \Illuminate\Http\JsonResponse
     */
    public function setResponse($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    /**
     * @param $exception
     * @param $status
     * @author João Pedro B Santos
     * @return \Illuminate\Http\JsonResponse
     */
    public function setError($exception, $code = 400)
    {
        if ($exception instanceof \Throwable) {
            return response()->json([
                'code' => $code,
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'message' => $exception->getMessage(),
            ], $code);
        }
        return response()->json([
            'message' => $exception,
        ], $code);
    }

    /**
     * @param $items
     * @param int $perPage
     * @param $page
     * @param array $options
     * @return LengthAwarePaginator
     * @author João Pedro B Santos
     */
    protected function paginate($items, int $perPage = 5, $page = null, array $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items->values() : Collection::make($items)->values();

        return new LengthAwarePaginator($items->forPage($page, $perPage)->values(), $items->count(), $perPage, $page, $options);
    }

}
