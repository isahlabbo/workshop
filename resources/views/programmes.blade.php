
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISBAW ! Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            margin-bottom: 50px;
            background-color: white !important;
        }

        .welcome {
            background: linear-gradient(180deg, white, rgb(0, 150, 215));
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .services,
        .testimonials,
        .footer {
            padding: 50px 0;
        }

        .services .card,
        .testimonials .card {
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top shadow-sm" style="background-color: rgb(45,56,255) !important; height: 120px;">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/brand_logo.png') }}" height="120" width="300" alt="Brand Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;">
                    <i class="fas fa-users"></i> <b>Who We Are</b>
                </a>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <i class="fas fa-book"></i> <b>Management</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Coordinator</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Assessor</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Facilitators</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Internal Quality Assurance</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> External Quality Assurance</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('programme', ['bootcamp']) }}" style="color: white;">
                    <i class="fas fa-laptop-code"></i> <b>Bootcamps</b>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('programme', ['workshop']) }}" style="color: white;">
                    <i class="fas fa-chalkboard-teacher"></i> <b>Workshops</b>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}" style="color: white;">
                    <i class="fas fa-user-plus"></i> <b>Register</b>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="color: white;">
                    <i class="fas fa-sign-in-alt"></i> <b>Login</b>
                </a>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>
<br>
<br>
<br>
    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
       
            @foreach(App\Models\Programme::where('type', request()->type)->get() as $programme)
            <div  class="mb-5" id="programme_{{$programme->id}}">
                <h3 class="text-center" style="color: rgb(0,0,64);">{{$programme->name}} {{ucwords( request()->type)}}s</h3>
                <div class="row">
                @if(request()->type == 'bootcamp')
                    @foreach($programme->bootcamps as $bootcamp)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i style="color: rgb(0, 150, 215) !important;"class="{{$bootcamp->icon}} fa-3x mb-3"></i>
                                    <h5 class="card-title" style="color: rgb(0,0,64);">{{$bootcamp->title}}</h5>
                                    <p class="card-text">{{$bootcamp->description}} 
                                    @if($bootcamp->application == 'open')
                                    <a class="btn btn-outline-primary" href="{{route('programme.bootcamp.view',[$bootcamp->id])}}">view details information and proceed to application</a></p>
                                    @else
                                    <a href="#" class="btn btn-outline-warning">The application to this <b>bootcamp</b> currently close</a> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif(request()->type == 'workshop')
                    @foreach($programme->workshops as $workshop)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i style="color: rgb(0, 150, 215) !important;"class="{{$workshop->icon}} fa-3x mb-3"></i>
                                    <h5 class="card-title" style="color: rgb(0,0,64);">{{$workshop->title}}</h5>
                                    <p class="card-text">{{$workshop->description}} 
                                    @if($workshop->application == 'open')
                                    <a href="{{route('programme.workshop.view',[$workshop->id])}}">view details information and proceed to application</a></p>
                                    @else
                                    <a href="#" class="btn btn-outline-warning">The application to this <b>workshop</b> currently close</a> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert">{{'No Record found for ' .request()->type}}</div>
                @endif   
                </div>
            </div>
            @endforeach
        </div>
    </section>

   

    <!-- Footer Section -->
    <footer class="footer bg-dark text-white">
        <div class="container text-center">
            <p>&copy; {{date('Y')}} Catsol Institute of Computer Technology. All Rights Reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-white">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="text-white">Terms of Service</a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="text-white">Contact Us</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>