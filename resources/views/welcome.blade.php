
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISWAB ! Welcome</title>
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

        /* Add the CSS animations here */
	 @keyframes fadeIn {
		from { opacity: 0; }
		to { opacity: 1; }
	}
	.fade-in {
		opacity: 0; /* Initial state */
		transition: opacity 2s ease-in-out;
	}
	.fade-in.in-view {
		opacity: 1; /* Final state */
	}
	@keyframes slideInLeft {
		from { transform: translateX(-100%); }
		to { transform: translateX(0); }
	}
	.slide-in-left {
		opacity: 0;
		transform: translateX(-100%);
		transition: transform 1s ease-in-out, opacity 1s ease-in-out;
	}
	.slide-in-left.in-view {
		opacity: 1;
		transform: translateX(0);
	}
	@keyframes zoomIn {
		from { transform: scale(0); }
		to { transform: scale(1); }
	}
	.zoom-in {
		opacity: 0;
		transform: scale(0);
		transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
	}
	.zoom-in.in-view {
		opacity: 1;
		transform: scale(1);
	}
	@keyframes bounce {
		0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
		40% { transform: translateY(-30px); }
		60% { transform: translateY(-15px); }
	}
	.bounce {
		opacity: 0;
		transition: opacity 2s;
	}
	.bounce.in-view {
		opacity: 1;
		animation: bounce 2s infinite;
	}
	@keyframes flip {
		from { transform: rotateY(0); }
		to { transform: rotateY(360deg); }
	}
	.flip {
		opacity: 0;
		transform: rotateY(0);
		transition: transform 1s ease-in-out, opacity 1s ease-in-out;
	}
	.flip.in-view {
		opacity: 1;
		transform: rotateY(360deg);
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
            <li><a class="nav-link" href="{{route('programme',['bootcamp'])}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-laptop-code"></i></span><b> Bootcamps</b></a></li>
            <li><a class="nav-link" href="{{route('programme',['workshop'])}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-chalkboard-teacher"></i></span><b> Workshops</b></a></li>
            <li><a class="nav-link" href="{{route('register')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-user-plus"></i></span><b> Register</b></a></li>
            <li><a class="nav-link" href="{{route('login')}}" style="color: rgb(0, 150, 215);"><span><i class="fas fa-sign-in-alt"></i></span><b> Login</b></a></li>
            </ul>
        </div>
    </nav>
    
    
    <!-- Welcome Section -->
    <section class="welcome1" >
        <div class="background">
        <img src="{{asset('images/bg.png')}}" alt="" style="height: 500px; width: 100%; opacity: 0.3;">
        </div>
        <div class="container " style="position: absolute; top: 10px; " >
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: left; padding: 50px;">
                    <h1 class="text text-primary text-center" style="font-family: 'Cooper Black';">
                    <br>
                    <br>
                    Caliphate Tech. Solutions Limited in Collaboration with Institute of Computer Technology, Sokoto
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    
                </div>
                <div class="col-md-7 col-sm-12">
                    
                    <p class="text text-center"><em><b>Present</b></em></p>
                    <br>
                    <h5 class="text text-center" style="font-family: sans-serif; "><b>ONLINE AND PHYSICAL DIGITAL SKILLS WORKSHOP AND  BOOTCAMP PROGRAMMES</b></h5>
                    <h6 class="text text-center">Unlock opportunities for lucrative tech careers across the globe.</h6> 
                    <p>
                    
                    <table>
                        <tr>
                            <td class="badge badge-primary p-2 mr-4 mb-2">Start Date <i class="fas fa-calendar"></i></td>
                            <td class="badge badge-primary p-2  mr-4 mb-2">1st April, 2025</td>
                        </tr>
                        <tr>
                            <td class="badge badge-primary p-2  mr-4 mb-2">Time <i class="fas fa-clock"></i></td>
                            <td class="badge badge-primary p-2  mr-4 mb-2">Morning, Afternoon, Eveneing or Night</td>
                        </tr>
                        <tr>
                            <td class="badge badge-primary p-2  mr-4 mb-2">Mode </td>
                            <td class="badge badge-primary p-2  mr-4 mb-2">Virtual or Physical</td>
                        </tr>
                        </table>
                        
                            <a class="btn btn-primary btn-sm mt-4" href="{{route('programme',['bootcamp'])}}">View Available Bootcamps</a> 
                            <a class="btn btn-info btn-sm mt-4" href="{{route('programme',['workshop'])}}">View Available Workshops</a>
                    
                    </p>  
                </div>
            </div>
        </div>
    </section>
    
    <section class="container my-5">
        <div class="row text-justify">
            <div class="col-md-7">
                <div class="card-body p-4">
                    <i class="fas fa-laptop-code fa-3x mb-3"></i>
                    <h3>Bootcamp</h3>
                    <p>Our bootcamp is an intensive, online or physical training program that spans several weeks or months, designed to take participants from beginner to proficient in a specific field, such as coding, cybersecurity, or data science. It follows a well-organized curriculum with hands-on projects, mentorship, and career-oriented learning, making it ideal for individuals looking for deep expertise and job-ready skills. If you are committed to long-term learning and career advancement, a bootcamp is the right choice.</p>
                    <a href="{{route('programme',['bootcamp'])}}" class="btn btn-primary">View Bootcamps</a>
                </div>
            </div>
            <div class="col-md-5">
                
            </div>
        </div>
    </section>

    <section style="background-color: rgb(186,223,245)">
        <div  class="container my-5">
            <div class="row text-justify">
                
                <div class="col-md-6">
                    <div class="card-body p-4 ">
                        <i class="fas fa-chalkboard-teacher fa-3x text-secondary mb-3"></i>
                        <h3>Workshop</h3>
                        <p>A workshop is a short-term, online or physical interactive training session lasting a few hours to a few days, focusing on specific skills or concepts. It is designed to provide quick, practical knowledge through demonstrations, discussions, and hands-on activities. Workshops are ideal for professionals and learners who want to enhance their skills, gain new insights, or stay updated on industry trends without committing to a long program. If you prefer a quick learning experience with immediate application, a workshop is the best option.</p>
                        <a href="{{route('programme',['workshop'])}}" class="btn btn-secondary">View Workshops</a>
                    </div>
                </div>
                <div class="col-md-6">
                    
                        <img src="{{asset('images/workshop.png')}}" alt="" >
                    
                </div>
            </div>
        </div>
    </section>

    
    <section class="container my-5">
    <h3 class="text text-center m-4">Our Affiliated Centres</h3>
        <div class="row text-center">
        @foreach(App\Models\Centre::all() as $centre)
            <div class="col-md-4">
                <div class="card-body mb-2 shadow p-4">
                    <h6><i class="fas fa-home"></i> {{$centre->name}}</h6>
                    <p class="text text-primary"><i class="fas fa-address"></i>{{$centre->address}}</p>
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