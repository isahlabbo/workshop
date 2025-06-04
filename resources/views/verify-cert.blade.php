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

  <title>DISWAB! @yield('title') </title>

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

  
<section >
    <div class="container">
    <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 m-4">
                <div class="card-body shadow mt-4">
                    <div class="text-center"><img src="{{asset('images/logo.png')}}" alt=""  ></div>
                    <h2 class="text text-center text-primary"><b>🎉 Certificate Verified</b></h2>
                        <x-slot name="logo">
                        
                        </x-slot>
                        
                        <p class="status">This certificate is valid and has been successfully verified.</p>

                        <div class="certificate-info">
                            <h3><b>Certificate Details:</b></h3>
                            <p><strong>Name:</strong> {{ucwords(strtolower($certificate->application->user->name))}}</p>
                            <p><strong>Certificate ID:</strong> {{$certificate->no}}</p>
                            <p><strong>Registration No:</strong> {{$certificate->application->registration_no}}</p>
                            <p><strong>Issued On:</strong> {{date('d M, Y',strtotime($certificate->application->schedule->certificate_distribution_date))}}</p>
                            <p><strong>Issued By:</strong> Catsol Institute of Computer Technology</p>
                            <p><strong>Program:</strong> Digital Skills Workshops and Bootcamps</p>
                        </div>

                        <div class="footer">
                            For further assistance, contact us at <b><em>diswabonline@gmail.com</em></b>
                        </div>

                </div>
            </div>
        </div>
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
var text = "Register here";

// Speed of typing (in milliseconds)
var speed = 50;

// Initialize index
var i = 0;

// Function to type text
function typeWriter() {
if (i < text.length) {
document.getElementById("register").innerHTML += text.charAt(i);
i++;
setTimeout(typeWriter, speed);
}
}

// Call the function
typeWriter();
</script>
</body>

</html>