<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticator;
use App\Models\Sessions;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class AuthenticatorController extends Controller
{
    private $authenticator;

    protected array $rules = [
        'email' => ['required', 'string'],
        'password' => ['required', 'string'],
    ];

    public function __construct()
    {
        $this->authenticator = new Authenticator();
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $validator = $this->validate($request, $this->rules);
            $auth = Auth::attempt($validator);
            if ($auth) {
                $user = User::where('email', $request->email)->first();
                $uuid = $this->setUUID($user);
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'session_id' => $uuid->uuid,
                    'user_ip' => $request->ip(),
                ];
            }
            throw new \Exception('Invalid credentials');
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    private function setUUID($user)
    {

        $uuid = Uuid::uuid4()->toString();
        $session = $user->session()->create([
            'uuid' => $uuid,
            'user_id' => $user->id,
            'user_ip' => request()->ip(),
            'created_at' => now(),
            'validity' => now()->addMinutes(env('SESSION_TIMEOUT', 180)),
        ]);
        return $session;
    }
}
