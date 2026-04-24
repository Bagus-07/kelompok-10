<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - StayEase</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 30px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <input type="text" id="username" placeholder="Username">
    <input type="password" id="password" placeholder="Password">

    <button onclick="login()">Login</button>
</div>

<script>
function login() {
    let user = document.getElementById('username').value;
    let pass = document.getElementById('password').value;

    if(user === "admin" && pass === "123") {
        // SIMPAN USERNAME
        localStorage.setItem("adminUsername", user);

        window.location.href = "/dashboard";
    } else {
        alert("Username atau password salah!");
    }
}
</script>

</body>
</html>