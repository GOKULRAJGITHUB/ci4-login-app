<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h4>Welcome <?= session()->get('user_name') ?></h4>
            <p>Status: Logged In</p>

            <a href="/logout" class="btn btn-danger mt-3">Logout</a>
        </div>
    </div>
</div>

</body>
</html>
