<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container">
  <header class="bg-warning text-center">HEADER</header> 
    <main>
        <div class="container">
            <h1 class="mt-5 mb-3">
                @yield('title')
            </h1>
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
  <footer class="bg-success text-center">FOOTER</footer> 
</body>
</html>
