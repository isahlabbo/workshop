
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5-DDST ! Welcome</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="{{asset('images\logo.png')}}" height="60" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" style="color: rgb(0, 150, 215) !important;" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
            <li><a class="nav-link" href="" style="color: rgb(0, 150, 215);"><span><i class="fas fa-users"></i></span><b> Who We Are</b></a></li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: rgb(0, 150, 215);">
                    <span><i class="fas fa-book"></i></span> <span><b>Management</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown" style="width: 250px;">
                 
                    <a class="nav-link"  href="#"><span><i class="fas fa-user"></i></span> Coordinator</a>
                    <a class="nav-link"  href="#"><span><i class="fas fa-user"></i></span> Assessor</a>
                    <a class="nav-link"  href="#"><span><i class="fas fa-user"></i></span> Facilitators</a>
                    <a class="nav-link"  href="#"><span><i class="fas fa-user"></i></span> Internal Quality Assurance</a>
                    <a class="nav-link"  href="#"><span><i class="fas fa-user"></i></span> External Quality Assuarance</a>
                  
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: rgb(0, 150, 215);">
                    <span><i class="fas fa-book"></i></span> <span><b>Bootcamps</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown" style="width: 250px;">
                  @foreach(App\Models\Programme::where('type', 'bootcamp')->get() as $programme)
                    <a class="nav-link"  href="#programme_{{$programme->id}}"><span><i class="{{$programme->icon}}"></i></span> {{$programme->name}}</a>
                  @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: rgb(0, 150, 215);">
                    <span><i class="fas fa-book"></i></span> <span><b>Workshops</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown" style="width: 250px;">
                  @foreach(App\Models\Programme::where('type', 'workshop')->get() as $programme)
                    <a class="nav-link"  href="#programme_{{$programme->id}}"><span><i class="{{$programme->icon}}"></i></span> {{$programme->name}}</a>
                  @endforeach
                </div>
            </li>
            <li><a class="nav-link" href="{{route('register')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-user-plus"></i></span><b> Register</b></a></li>
            <li><a class="nav-link" href="{{route('login')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-sign-in-alt"></i></span><b> Login</b></a></li>
            </ul>
        </div>
    </nav>
    
    
    <!-- Welcome Section -->
    <section class="welcome1">
        <div class="contaivner">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{asset('images\w2.png')}}" width="100%" height="500" alt="">
                </div>
                <div class="col-md-5" style="text-align: left; position: absolute; top: 150px; padding: 50px;">
                    <h1 style="color:white;"><b>Strengthen Your CV in Only 5 Days Through our Comprehensive Computer Training Workshops</b></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            @foreach(App\Models\programme::all() as $programme)
            <div  class="mb-5" id="programme_{{$programme->id}}">
                <h3 class="text-center" style="color: rgb(0,0,64);">{{$programme->name}}</h3>
                <div class="row">
                @if($programme->type == 'workshop')
                    @foreach($programme->workshops as $workshop)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i style="color: rgb(0, 150, 215) !important;"class="{{$workshop->icon}} fa-3x mb-3"></i>
                                <h5 class="card-title" style="color: rgb(0,0,64);">{{$workshop->title}}</h5>
                                <p class="card-text">{{$workshop->description}} <a href="{{route('workshop.view',[$workshop->id])}}">view details information and apply here</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                @foreach($programme->bootcamps as $bootcamp)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i style="color: rgb(0, 150, 215) !important;"class="{{$bootcamp->icon}} fa-3x mb-3"></i>
                                <h5 class="card-title" style="color: rgb(0,0,64);">{{$bootcamp->title}}</h5>
                                <p class="card-text">{{$bootcamp->description}} <a href="">view details information and apply here</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif    
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials bg-light">
        <div class="container">
            <h2 class="text-center">Testimonials</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">"The Digital Literacy Workshop helped me improve my computer skills significantly. I can now navigate the internet and use Microsoft Office with confidence."</p>
                            <p class="text-muted">- Jamila Sani, Student</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">"The Cyber Security Training Workshop was an eye-opener. I learned how to protect my data and the importance of cybersecurity in today's digital age."</p>
                            <p class="text-muted">- Salihu Muhammed, IT Professional</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">"Thanks to the Data Management and Analysis Workshop, I can now make data-driven decisions that have improved our operational efficiency."</p>
                            <p class="text-muted">- Adamu Muhammad, Business Manager</p>
                        </div>
                    </div>
                </div>
            </div>
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