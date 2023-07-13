<!DOCTYPE html>
<html>
<head>
    <title>Admin Kursus</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Management Application</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Dashboard</a></li>
      <li class="{{ Request::is('courses') ? 'active' : '' }}"><a href="{{ route('courses.index') }}">Course</a></li>
      <!-- <li class="{{ Request::is('materials') ? 'active' : '' }}"><a href="{{ route('materials.index') }}">Material</a></li> -->
    </ul>
  </div>
</nav>

<div class="container">
    <div class="card" style="margin-top: 20px;">
        <div class="card-body">
        @yield('content')
        </div>
    </div>
</div>

</body>
</html>