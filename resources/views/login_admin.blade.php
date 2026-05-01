<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Login - StayEase</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-md w-80">

    <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>

    <input type="text" id="username"
        placeholder="Username"
        class="w-full p-2 border rounded mb-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

    <input type="password" id="password"
        placeholder="Password"
        class="w-full p-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

    <button onclick="login()"
        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">
        Login
    </button>
    <p id="errorMsg" class="text-red-500 text-sm mt-2 hidden">
        Username atau password salah!
    </p>

</div>

<script>
function login() {
    let user = document.getElementById('username').value;
    let pass = document.getElementById('password').value;

    if(user === "admin" && pass === "123") {
        localStorage.setItem("adminUsername", user);
        window.location.href = "/dashboard";
    } else {
        alert("Username atau password salah!");
    }

    document.getElementById("errorMsg").classList.remove("hidden");
    document.getElementById("username").addEventListener("input", hideError);
    document.getElementById("password").addEventListener("input", hideError);

    function hideError() {
        let err = document.getElementById("errorMsg");
        if(err) err.classList.add("hidden");
}
}
</script>

</body>
</html>