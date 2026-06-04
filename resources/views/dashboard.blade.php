<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-sm btn-outline-secondary">Logout</button>
        </form>
    @else
    This is is the Dashboard to Create the Post!!!
    @endauth
</body>
</html>
