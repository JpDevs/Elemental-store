<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'string'],
        'password' => ['required', 'string'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $users = User::query();
            $validate = $request->validate([
                'term' => ['nullable', 'string'],
                'page' => ['nullable', 'integer'],
                'limit' => ['nullable', 'integer'],
            ]);
            if (isset($validate['term'])) {
                $users->where('name', 'like', '%' . $validate['term'] . '%');
            }
            $response = $this->paginate($users->get(), $validate['limit'] ?? 10, $validate['page'] ?? 1);
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author João Pedro B Santos
     */
    public function store(Request $request)
    {
        try {
            $params = $this->validate($request, $this->rules);
            $params['password'] = Hash::make($params['password']);
            $response = DB::transaction(function () use ($params) {
                return User::create($params);
            });
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response, 201);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $response = User::findOrFail($id);
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return null;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @author João Pedro B Santos
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $params = $this->validate($request, $this->rules);
            $params['password'] = Hash::make($params['password']);
            $response = DB::transaction(function () use ($params, $id) {
                $user = User::findOrFail($id);
                $user->update($params);
                return $user;
            });
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @author João Pedro B Santos
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $user = User::findOrFail($id);
                return $user->delete();
            });
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse(null, 204);
    }
}
