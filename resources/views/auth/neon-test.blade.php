<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Neon Auth Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        button { padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        input { padding: 10px; margin: 5px 0; width: 100%; border: 1px solid #ddd; border-radius: 5px; }
        #result { margin-top: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background: #f9f9f9; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>🧪 Neon Auth Test</h1>
    
    <h2>Sign Up</h2>
    <form id="signupForm">
        <input type="email" id="signupEmail" placeholder="Email" required>
        <input type="password" id="signupPassword" placeholder="Password (min 8 chars)" required>
        <button type="submit">Sign Up</button>
    </form>
    
    <h2>Login</h2>
    <form id="loginForm">
        <input type="email" id="loginEmail" placeholder="Email" required>
        <input type="password" id="loginPassword" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    
    <h2>Get Current User</h2>
    <button id="meButton">Get Current User</button>
    
    <h2>Logout</h2>
    <button id="logoutButton">Logout</button>
    
    <h2>Test Neon API</h2>
    <button id="testNeonApiButton">Test Neon API Connection</button>
    
    <h2>Result</h2>
    <div id="result">Waiting for action...</div>

    <script>
        const AUTH_BASE_URL = '{{ env("NEON_AUTH_BASE_URL", "") }}';
        const NEON_API_KEY = '{{ env("NEON_API_KEY", "") }}';
        const NEON_PROJECT_ID = '{{ env("NEON_PROJECT_ID", "") }}';
        const NEON_BRANCH_ID = '{{ env("NEON_BRANCH_ID", "") }}';
        let token = localStorage.getItem('neon_auth_token') || '';

        async function neonAuthRequest(endpoint, method = 'GET', body = null) {
            const url = `${AUTH_BASE_URL}${endpoint}`;
            const options = {
                method,
                headers: {
                    'Content-Type': 'application/json',
                    ...(token && { 'Authorization': `Bearer ${token}` })
                },
                ...(body && { body: JSON.stringify(body) })
            };

            try {
                const response = await fetch(url, options);
                const data = await response.json();
                return { ok: response.ok, status: response.status, data };
            } catch (error) {
                return { ok: false, status: 0, data: { error: error.message } };
            }
        }

        async function neonApiRequest(endpoint, method = 'GET', body = null) {
            const url = `https://console.neon.tech/api/v2/${endpoint}`;
            const options = {
                method,
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${NEON_API_KEY}`
                },
                ...(body && { body: JSON.stringify(body) })
            };

            try {
                const response = await fetch(url, options);
                const data = await response.json();
                return { ok: response.ok, status: response.status, data };
            } catch (error) {
                return { ok: false, status: 0, data: { error: error.message } };
            }
        }

        async function signup(e) {
            e.preventDefault();
            const email = document.getElementById('signupEmail').value;
            const password = document.getElementById('signupPassword').value;
            
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = 'Signing up via Neon API...';

            // Try using Neon API to create user
            const res = await neonApiRequest(
                `projects/${NEON_PROJECT_ID}/branches/${NEON_BRANCH_ID}/auth/users`,
                'POST',
                { email, password }
            );
            
            if (res.ok) {
                resultDiv.innerHTML = `<span class="success">✅ User created via Neon API! User ID: ${res.data?.id || 'unknown'}</span>`;
            } else {
                resultDiv.innerHTML = `<span class="error">❌ Neon API signup failed: ${res.data?.message || JSON.stringify(res.data)} (Status: ${res.status})</span>`;
            }
        }

        async function login(e) {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = 'Logging in via Better Auth API...';

            // Try using Better Auth API for login
            const res = await neonAuthRequest('/api/auth/signin/email', 'POST', { email, password });
            
            if (res.ok) {
                token = res.data?.token || res.data?.session_token || '';
                if (token) {
                    localStorage.setItem('neon_auth_token', token);
                    resultDiv.innerHTML = `<span class="success">✅ Login successful! Token: ${token.substring(0, 20)}...</span>`;
                } else {
                    resultDiv.innerHTML = `<span class="success">✅ Login successful! User: ${JSON.stringify(res.data)}</span>`;
                }
            } else {
                resultDiv.innerHTML = `<span class="error">❌ Login failed: ${res.data?.message || JSON.stringify(res.data)} (Status: ${res.status})</span>`;
            }
        }

        async function getCurrentUser() {
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = 'Fetching user via Better Auth API...';

            const res = await neonAuthRequest('/api/auth/session');
            
            if (res.ok) {
                resultDiv.innerHTML = `<span class="success">✅ Current user: ${JSON.stringify(res.data, null, 2)}</span>`;
            } else {
                resultDiv.innerHTML = `<span class="error">❌ Failed to fetch user: ${res.data?.message || JSON.stringify(res.data)} (Status: ${res.status})</span>`;
            }
        }

        async function testNeonApi() {
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = 'Testing Neon API...';

            const res = await neonApiRequest(
                `projects/${NEON_PROJECT_ID}/branches/${NEON_BRANCH_ID}/auth`,
                'GET'
            );
            
            if (res.ok) {
                resultDiv.innerHTML = `<span class="success">✅ Neon API working! Auth info: ${JSON.stringify(res.data, null, 2)}</span>`;
            } else {
                resultDiv.innerHTML = `<span class="error">❌ Neon API test failed: ${res.data?.message || JSON.stringify(res.data)} (Status: ${res.status})</span>`;
            }
        }

        async function logout() {
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = 'Logging out...';

            token = '';
            localStorage.removeItem('neon_auth_token');
            resultDiv.innerHTML = '<span class="success">✅ Logged out successfully</span>';
        }

        document.getElementById('signupForm').addEventListener('submit', signup);
        document.getElementById('loginForm').addEventListener('submit', login);
        document.getElementById('meButton').addEventListener('click', getCurrentUser);
        document.getElementById('logoutButton').addEventListener('click', logout);
        document.getElementById('testNeonApiButton').addEventListener('click', testNeonApi);

        // Check on page load
        if (token) {
            document.getElementById('result').innerHTML = `<span class="success">🔑 Token found: ${token.substring(0, 20)}...</span>`;
        }
    </script>
</body>
</html>
