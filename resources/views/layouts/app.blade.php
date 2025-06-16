
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISWAB | @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
            padding-top: 70px;
        }

        .navbar-logo {
            width: 100px;
            height: auto;
        }

        /* Medium screens (tablets, 768px and below) */
        @media (max-width: 768px) {
            .navbar-logo {
                width: 120px;
                height: auto;
            }
        }

        /* Small screens (phones, 480px and below) */
        @media (max-width: 480px) {
            .navbar-logo {
                width: 80px;
                height: auto;
            }
        }

        input[type="checkbox"], input[type="radio"]{
            width: 20px;
            height: 20px;
        }

        .required-label::after {
            content: " *";
            color: red;
            font-size: 25px;
        }
  </style>
  @yield('styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" style="background-color: rgb(45,56,255) !important; ">
        <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{asset('images/app_logo.png')}}" class="navbar-logo"  alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" style="color: rgb(0, 150, 215) !important;" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto"> 
            
            @if(Auth::user()->role == 'admin')
            <li><a class="nav-link" href="{{route('payment.index')}}" style="color: white;"><span><i class="fas fa-wallet"></i></span><b> Payments</b></a></li>
            <li><a class="nav-link" href="{{route('application.index')}}" style="color: white;"><span><i class="fas fa-list"></i></span><b> Applications</b></a></li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-shield-alt"></i></span> <span><b>Access Control</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white !important;">
                
                    <a class="nav-link"  href="{{route('access.index')}}"><span><i class="fas fa-user-tag"></i></span> Role</a>
                    <a class="nav-link"  href="" style="color: white;"><span><i class="fas fa-key"></i></span> Permissions</a>
                    <a class="nav-link"  href="" style="color: white;"><span><i class="fas fa-user-shield"></i></span> Role Permissions</a>
                    <a class="nav-link"  href="" style="color: white;"><span><i class="fas fa-users-cog"></i></span> User Roles</a>
                    <a class="nav-link"  href="" style="color: white;"><span><i class="fas fa-user-lock"></i></span> User Permissions</a>
                    
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-book"></i></span> <span><b>Bootcamps</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white;">
                @foreach(App\Models\Programme::all() as $programme)
                    @if($programme->type =='bootcamp')
                        <a class="nav-link"  href="{{route('programme.bootcamp.index',[$programme->id])}}" style="color: white;"><span><i class="fas fa-list"></i></span> {{$programme->name}} {{ucwords($programme->type)}}</a>
                    @endif
                @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-book"></i></span> <span><b>Workshops</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white !important;">
                    @foreach(App\Models\Programme::all() as $programme)
                        @if($programme->type =='workshop')
                            <a class="nav-link"  href="{{route('programme.workshop.index',[$programme->id])}}" style="color: white;"><span><i class="fas fa-list"></i></span> {{$programme->name}}</a>
                        @endif
                    @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-users"></i></span> <span><b>Users</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white !important;">
                <a class="nav-link" href="{{route('coordinator.index')}}" style="color: white;"><span><i class="fas fa-calendar"></i> </span><b>Coordinators</b></a>
                <a class="nav-link" href="{{route('facilitator.index')}}" style="color: white;"><span><i class="fas fa-user"></i></span><b> Facilitators</b></a>
                <a class="nav-link" href="{{route('participant.index')}}" style="color: white;"><span><i class="fas fa-user"></i></span><b> Participant</b></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-users"></i></span> <span><b>Administration</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white;">
                <a class="nav-link" href="{{route('programme.index')}}" style="color: white;"><span><i class="fas fa-list"></i> </span><b>Programmes</b></a>
                <a class="nav-link" href="{{route('calendar.index')}}" style="color: white;"><span><i class="fas fa-calendar"></i> </span><b>Calendar</b></a>
                <a class="nav-link" href="#" style="color: white;"><span><i class="fas fa-graduation-cap"></i></span><b> Certificates</b></a>
                <a class="nav-link" href="{{route('schedule.index')}}" style="color: white;"><span><i class="fas fa-clock"></i></span><b> Schedule</b></a>
                <a class="nav-link" href="{{route('coupon.index')}}" style="color: white;"><span><i class="fas fa-dollar"></i></span><b> Coupon</b></a>
                <a class="nav-link" href="{{route('centre.index')}}" style="color: white;"><span><i class="fas fa-home"></i></span><b> Centres</b></a>
                </div>
            </li>
            
            
            
            @endif

            @if(Auth::user()->role == 'participant')
            <li><a class="nav-link" href="#" style="color: white;"><span><i class="fas fa-receipt"></i></span><b> Receipt</b></a></li>
            <li><a class="nav-link" href="#" style="color: white;"><span><i class="fas fa-search"></i></span><b> Assigment</b></a></li>
            <li><a class="nav-link" href="#" style="color: white;"><span><i class="fas fa-pen"></i></span><b> Exam</b></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-graduation-cap"></i></span> <span><b>Certificates</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white;">
                  @foreach(Auth::user()->applications as $application)
                    <a class="nav-link"  href="{{route('application.certificate.view',[$application->id])}}"><span><i class="fas fa-graduation-cap"></i></span> {{$application->workshop->title}}</a>
                  @endforeach
                </div>
            </li>
            @endif

            @if(Auth::user()->role == 'facilitator')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-book"></i></span> <span><b>Bootcamps</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white;">
                @foreach(Auth::user()->coordinators as $coordinator)
                    @if($coordinator->programme->type =='bootcamp')
                        <a class="nav-link"  href="{{route('programme.bootcamp.index',[$coordinator->programme_id])}}"><span><i class="fas fa-list"></i></span> {{$coordinator->programme->name}} {{ucwords($coordinator->programme->type)}}</a>
                    @endif
                @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-book"></i></span> <span><b>Workshops</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white;">
                    @foreach(Auth::user()->coordinators as $coordinator)
                        @if($coordinator->programme->type =='workshop')
                            <a class="nav-link"  href="{{route('programme.workshop.index',[$coordinator->programme_id])}}"><span><i class="fas fa-list"></i></span> {{$coordinator->programme->name}}</a>
                        @endif
                    @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ministryDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span><i class="fas fa-clock"></i></span> <span><b>Schedule</b></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="ministryDropdown p-2" style="background-color: rgb(45,56,255) !important; width: 300px; padding: 10px !important; color: white;">
                    @foreach(Auth::user()->coordinators as $coordinator)
                        @foreach($coordinator->programme->workshops as $workshop)
                        @foreach($workshop->schedules as $schedule)
                            <a class="nav-link"  href="{{route('schedule.view',[$schedule->id])}}"><span><i class="fas fa-clock"></i></span> {{$schedule->workshop->title}} / {{$schedule->centre->name}}</a>
                        @endforeach
                        @endforeach
                    @endforeach
                </div>
            </li>
            <li><a class="nav-link" href="#" style="color: white;"><span><i class="fas fa-search"></i></span><b> Assigment</b></a></li>
            <li><a class="nav-link" href="#" style="color: white;"><span><i class="fas fa-pen"></i></span><b> Exam</b></a></li>
            @endif
            <li><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;"><span><i class="fas fa-sign-out-alt"></i></span><b>Signout</b></a></li>
            <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
            </ul>
        </div>
    </nav>
    
    
    <!-- Welcome Section -->
    <section class="dashboard">
    <br>
    <br>
    <br>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#coupon').on('input', function() {
        var code = $(this).val();

        // Optional: Only trigger if length is at least 3 chars (to reduce unnecessary checks)
        if(code.length >= 10) {
            $.ajax({
                url: '/coupon/check',
                method: 'POST',
                data: {
                    code: code,
                    _token: '{{ csrf_token() }}'  // Laravel CSRF token
                },
                success: function(response) {
                    $('#success').html('');
                    $('#error').html('');
                    if(response.success) {
                        $('#success').html('✅ Coupon Available! and  ' + response.percentage_off + '% is off from your payment.');
                    } else {
                        $('#error').html('❌ This coupon code is not avaialable, but you can proceed to make your full payment.');
                    }
                },
                error: function() {
                    $('#error').html('⚠️ An error occurred.');
                }
            });
        } else {
            // Clear result if input is less than 3 characters
            $('#success').html('');
            $('#error').html('');
        }
    });
});
</script>

    <script>
        function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
    </script>
	
    <script>
		$(document).ready( function(){
			$('#myTable').DataTable();
		});
	</script>
    
    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#picture').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#picture_preview_container').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });
    </script>
</body>

</html>