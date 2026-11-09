<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NeonAuthController extends Controller
{
    protected $authBaseUrl;
    protected $projectId;
    protected $branchId;
    protected $neonApiToken;

    public function __construct()
    {
        $this->authBaseUrl = rtrim(env('NEON_AUTH_BASE_URL', 'http://localhost/auth'), '/');
        $this->projectId = env('NEON_PROJECT_ID', 'odd-wave-17368892');
        $this->branchId = env('NEON_BRANCH_ID', 'br-polished-rice-bd049yps');
        $this->neonApiToken = env('NEON_API_KEY');
    }

    /**
     * Sign up a new user with email and password using Neon API
     */
    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Use Neon API to create user
            $response = Http::withToken($this->neonApiToken)
                ->post("https://console.neon.tech/api/v2/projects/{$this->projectId}/branches/{$this->branchId}/auth/users", [
                    'email' => $request->email,
                    'password' => $request->password,
                ]);

            if ($response->successful()) {
                $data = $response->json();
                return response()->json([
                    'success' => true,
                    'user_id' => $data['id'] ?? null,
                    'email' => $request->email,
                    'message' => 'User created successfully'
                ]);
            }

            return response()->json([
                'error' => 'Signup failed',
                'details' => $response->body(),
            ], $response->status());
        } catch (\Exception $e) {
            Log::error('Neon Auth signup error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Signup failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Login with email and password using Better Auth API
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            // Use Better Auth API for login
            $response = Http::post($this->authBaseUrl . '/api/auth/signin/email', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                // Store token in session
                if (isset($data['token']) || isset($data['session_token'])) {
                    $token = $data['token'] ?? $data['session_token'];
                    $request->session()->put('neon_auth_token', $token);
                }
                return response()->json([
                    'success' => true,
                    'user' => $data,
                    'message' => 'Login successful'
                ]);
            }

            return response()->json([
                'error' => 'Login failed',
                'details' => $response->body(),
            ], $response->status());
        } catch (\Exception $e) {
            Log::error('Neon Auth login error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Login failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get current user
     */
    public function me(Request $request)
    {
        $token = $request->session()->get('neon_auth_token');

        if (!$token) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        try {
            $response = Http::withToken($token)
                ->get($this->authBaseUrl . '/api/auth/session');

            if ($response->successful()) {
                return $response->json();
            }

            return response()->json([
                'error' => 'Failed to fetch user',
                'details' => $response->body(),
            ], $response->status());
        } catch (\Exception $e) {
            Log::error('Neon Auth me error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Failed to fetch user',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->session()->forget('neon_auth_token');
        return response()->json(['message' => 'Logged out']);
    }

    /**
     * Test if Better Auth API is working
     */
    public function testAuth()
    {
        try {
            $response = Http::get($this->authBaseUrl . '/.well-known/jwks.json');
            if ($response->successful()) {
                return response()->json(['status' => 'ok', 'jwks' => $response->json()]);
            }
            return response()->json(['status' => 'error', 'message' => 'JWKS endpoint failed']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
