
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
    <style>
    .hero-carousel {
      height: 100vh;
      overflow: hidden;
    }

    .hero-carousel .carousel-item {
      height: 100vh;
      position: relative;
    }

    .hero-carousel img {
      object-fit: cover;
      height: 100%;
      width: 100%;
      animation: kenburns 8s ease-in-out forwards;
      transition: opacity 1s ease;
    }

    @keyframes kenburns {
      0% {
        transform: scale(1) translate(0, 0);
      }
      100% {
        transform: scale(1.2) translate(-20px, -20px);
      }
    }

    .description-box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      text-align: center;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px;
      border-radius: 12px;
      max-width: 90%;
    }

    .typed-cursor {
      font-weight: bold;
      font-size: 1.2em;
    }
  </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top shadow-sm" style="background-color: rgb(112,146,190) !important; height: 120px;">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/brand-logo.png') }}" height="70" width="300" alt="Brand Logo">
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

    
    
    <!-- Welcome Section -->
    <section class="welcome1">
        <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="8000">
           
            <div class="carousel-inner">
                <div class="carousel-item active" data-description="Learn Digital Skills, Build Real Project, and Lunch Your Career.">
                    <img src="{{asset('images/bg.png')}}" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item" data-description="Discover cutting-edge solutions tailored for you.">
                    <img src="{{asset('images/bg.png')}}" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item" data-description="Join us and transform your ideas into reality.">
                    <img src="{{asset('images/bg.png')}}" class="d-block w-100" alt="Slide 3">
                </div>

                <div class="carousel-item" data-description="we have industrial professional facilitator">
                    <img src="{{asset('images/bg.png')}}" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
    

            <!-- Description Box -->
            <div class="description-box h1">
            <span id="typed-text" style="font-weight: 900"></span>
            </div>
        </div>
    </section>

    <section class="container">
    
    
    <h5 class="text text-primary text-center m-4"><b>Available Workshops</b></h5>
    <div class="row">
    @foreach(App\Models\Schedule::where('status', 'open')->get() as $schedule)
    
    
    <div class="col-sm-6">
    <div class="card-body shadow p-4 m-2" style="border-radius: 0px 50px 0px 50px; border-top: 2px solid blue;">
        <b>{{$loop->iteration}}. {{$schedule->workshop->title}} From: <span class="badge badge-primary p-2">{{date('d M, Y',strtotime($schedule->start_date))}}</span>
        To: <span class="badge badge-primary p-2">{{date('d M, Y',strtotime($schedule->end_date))}}</span>
        </b>
        <p class="text text-justify mt-2" style="color:black;">{{$schedule->workshop->description}}
        <a class="btn btn-sm btn-outline-primary" href="{{route('programme.workshop.view',[$schedule->workshop->id])}}"><i class="fas fa-pen"></i> Apply Now</a></p>
        </p>
    </div>
    </div>
    
    @endforeach
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <script>
$(document).ready(function() {
  var typed;
  
  function showDescription(text) {
    if (typed) {
      typed.destroy();
    }
    $('#typed-text').fadeOut(200, function() {
      $('#typed-text').html('').fadeIn(200, function() {
        typed = new Typed('#typed-text', {
          strings: [text],
          typeSpeed: 50,
          showCursor: true,
          cursorChar: '|',
          onComplete: function() {
            setTimeout(() => {
              $('#typed-text').fadeOut(800);
            }, 2000); // wait 2 sec before fade out
          }
        });
      });
    });
  }

  // Initialize first description
  var firstDesc = $('.carousel-item.active').data('description');
  showDescription(firstDesc);

  // On slide event
  $('#heroCarousel').on('slide.bs.carousel', function (e) {
    var nextSlide = $(e.relatedTarget);
    var nextDesc = nextSlide.data('description');

    // Restart Ken Burns animation by removing/re-adding image
    var img = nextSlide.find('img');
    img.css('animation', 'none');
    img[0].offsetHeight; // trigger reflow
    img.css('animation', '');

    showDescription(nextDesc);
  });
});
</script>
    
</body>

</html>