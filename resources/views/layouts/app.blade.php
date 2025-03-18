<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Catsol </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
</head>

<body>

  <div class="hero_areas">

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
            <img src="{{asset('images/logo.png')}}" alt="" width="350px" >
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html" style="font-family: sans-serif">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html" style="color: rgb(46, 55, 169); font-family: sans-serif"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html" style="color: rgb(46, 55, 169); font-family: sans-serif">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="why.html" style="color: rgb(46, 55, 169); font-family: sans-serif">Why Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="team.html" style="color: rgb(46, 55, 169); font-family: sans-serif">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}" style="color: rgb(46, 55, 169); font-family: sans-serif"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit" style="color: rgb(46, 55, 169)">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
      <hr style="border: 1px dashed rgb(0, 142, 204);">
    </header>
    <!-- end header section -->
    

<section class="mt-4 p-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
            <div class="card-body shadow">
            <h5 class="text text-primary ">Please complete this form about your business and website you need</h5>
                <form action="{{route('business.register')}}" method="post">
                @csrf
                    <fieldset > <legend>Business Information</legend>
                        <div class="form-group">
                            <label for="">Business Name</label>
                            <input type="text" name="name" placeholder="Business Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Business Address</label>
                            <input type="text" name="name" placeholder="Business Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Business Description</label>
                            <textarea name="description" cols="30" rows="5" placeholder="Write Short Description About Your Business" class="form-control"></textarea>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Color 1</label>
                                <input type="color" name="color_1" placeholder="Business Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Color 2</label>
                                <input type="color" name="color_2" placeholder="Business Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Color 3</label>
                                <input type="color" name="color_3" placeholder="Business Name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>


 

  <!-- jQery -->
  <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  <script>
  // Text to be typed
  var text = "Welcome to Caliphate Tech. Solutions LTD, Your Partner in Digital Transformation";

  // Speed of typing (in milliseconds)
  var speed = 50;

  // Initialize index
  var i = 0;

  // Function to type text
  function typeWriter() {
    if (i < text.length) {
      document.getElementById("welcome").innerHTML += text.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    }
  }

  // Call the function
  typeWriter();
</script>
</body>

</html>