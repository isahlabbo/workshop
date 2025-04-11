
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISWAB ! @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
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
        <a class="navbar-brand ml-4" href="{{url('/')}}"><img src="{{asset('images\logo.png')}}" height="60" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" style="color: rgb(0, 150, 215) !important;" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto"> 
            
            @if(Auth::user()->role == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: rgb(0, 150, 215);">
                    <span><i class="fas fa-book"></i></span> <span><b>Programmes</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown" style="width: 250px;">
                  
                <a class="nav-link"  href="{{route('workshop.index')}}"><span><i class="fas fa-chalkboard-teacher"></i></span> Workshops</a>
                <a class="nav-link"  href="{{route('bootcamp.index')}}"><span><i class="fas fa-laptop-code"></i></span> Bootcamps</a>
                 
                </div>
            </li>
            <li><a class="nav-link" href="{{route('coordinator.index')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-calendar"></i> </span><b>Coordinators</b></a></li>
            <li><a class="nav-link" href="{{route('calendar.index')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-calendar"></i> </span><b>Calendar</b></a></li>
            <li><a class="nav-link" href="{{route('payment.index')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-wallet"></i></span><b> Payments</b></a></li>
            <li><a class="nav-link" href="{{route('application.index')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-list"></i></span><b> Applications</b></a></li>
            <li><a class="nav-link" href="#" style="color: rgb(0, 150, 215);"><span><i class="fas fa-graduation-cap"></i></span><b> Certificates</b></a></li>
            <li><a class="nav-link" href="{{route('schedule.index')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-clock"></i></span><b> Schedule</b></a></li>
            <li><a class="nav-link" href="{{route('centre.index')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-home"></i></span><b> Centres</b></a></li>
            <li><a class="nav-link" href="{{route('facilitator.index')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-user"></i></span><b> Facilitators</b></a></li>
            @endif

            @if(Auth::user()->role == 'student')
            <li><a class="nav-link" href="#" style="color: rgb(0, 150, 215);"><span><i class="fas fa-receipt"></i></span><b> Receipt</b></a></li>
            <li><a class="nav-link" href="#" style="color: rgb(0, 150, 215);"><span><i class="fas fa-search"></i></span><b> Assigment</b></a></li>
            <li><a class="nav-link" href="#" style="color: rgb(0, 150, 215);"><span><i class="fas fa-pen"></i></span><b> Exam</b></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: rgb(0, 150, 215);">
                    <span><i class="fas fa-graduation-cap"></i></span> <span><b>Certificates</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown" style="width: 250px;">
                  @foreach(Auth::user()->applications as $application)
                    <a class="nav-link"  href="#"><span><i class="fas fa-graduation-cap"></i></span> {{$application->workshop->title}}</a>
                  @endforeach
                </div>
            </li>
            @endif

            @if(Auth::user()->role == 'facilitator')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: rgb(0, 150, 215);">
                    <span><i class="fas fa-book"></i></span> <span><b>Bootcamps</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown" style="width: 250px;">
                @foreach(Auth::user()->coordinators as $coordinator)
                @if($coordinator->programme->type =='bootcamp')
                    <a class="nav-link"  href="#"><span><i class="fas fa-list"></i></span> {{$coordinator->programme->name}} {{ucwords($coordinator->programme->type)}}</a>
                @endif
            @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: rgb(0, 150, 215);">
                    <span><i class="fas fa-book"></i></span> <span><b>Workshops</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown" style="width: 250px;">
                    @foreach(Auth::user()->coordinators as $coordinator)
                        @if($coordinator->programme->type =='workshop')
                            <a class="nav-link"  href="#"><span><i class="fas fa-list"></i></span> {{$coordinator->programme->name}}</a>
                        @endif
                    @endforeach
                </div>
            </li>
            <li><a class="nav-link" href="#" style="color: rgb(0, 150, 215);"><span><i class="fas fa-search"></i></span><b> Assigment</b></a></li>
            <li><a class="nav-link" href="#" style="color: rgb(0, 150, 215);"><span><i class="fas fa-pen"></i></span><b> Exam</b></a></li>
            @endif
            <li><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: rgb(0, 150, 215);"><span><i class="fas fa-sign-out-alt"></i></span><b>Signout</b></a></li>
            <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
            </ul>
        </div>
    </nav>
    
    
    <!-- Welcome Section -->
    <section class="dashboard">
        <div class="container">
           @yield('content')
           @include('sweetalert::alert')
        </div>
    </section>

    

    @yield('scripts')
      
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>