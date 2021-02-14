<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Boostrap including -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">

  {{-- title will be added in different file --}}
  <title>

  @yield('title') 

  </title>

</head>

<body>

<!-- Copied from getbootstrap.com -> Get started -> Search for "Navbar" -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Todos App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/todos">Todos <span class="sr-only">(current)</span></a>
            </li>   

            <li class="nav-item active">
                <a class="nav-link" href="/new-todos">Create todos <span class="sr-only">(current)</span></a>
            </li>  
        </ul>
    </div>
</nav>

<!-- END of Copied --> 

<div class="container">

@if(session()->has('success'))

<div class="alert alert-success">
{{ session()->get('success') }}
</div>

@endif


<!-- Defining a section -->
@yield('content') 

</div>

</body>

</html>