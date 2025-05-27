@extends('layouts.app')

@section('title')
    {{strtolower($application->programme()->name)}} certificate
@endsection

@section('styles')
<style>
    body {
      font-family: 'Georgia', serif;
      text-align: center;
      padding: 50px;
    }
    .certificate {
      background: white;
      padding: 50px;
      margin: auto;
    }
    h1 {
      font-size: 36px;
      margin-bottom: 0;
    }
    h2 {
      font-size: 24px;
      font-weight: normal;
    }
    .name {
      font-size: 28px;
      font-weight: bold;
      color: #222;
    }
    .footer {
      margin-top: 10px;
      font-size: 16px;
    }
    button {
      margin-top: 30px;
      padding: 10px 20px;
      font-size: 16px;
      background: #5d6975;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
@endsection
@section('content')

<div class="certificate container" id="certificate">
    <div class="row">
        <div class="col-sm-2 text-right">
        <img src="{{asset('images/logo.png')}}" alt="">
        </div>
        <div class="col-sm-8 text text-left">
        <span style="font-family: 'cooper black'; font-size: 26px; color: rgb(112,146,190);"><b>Digital Skills</b></span><br>
        <span style="font-family: 'cooper black'; font-size: 22px; color: rgb(112,146,190);"><b>Workshop and Bootcamp</b></span><br>
        <span style="font-family: 'cooper black'; font-size: 18px; color:  rgb(53,247,102);"><b>Catsol Institute of Computer Tecnology in Affiliation to Usmanu Danfodiyo University, Sokoto</b></span><br>
        </div>
        <div class="col-sm-2 text-left">
        <img src="{{asset('images/udus.png')}}" alt="">
        </div>
    </div>

    <div class="text text-left mt-2" style=" color: rgb(157, 74, 202);  font-size: 100px; font-family: 'old english text MT';">
        <b>Certificate</b>
    </div>
    <h1 class="text text-left" style="font-size: 32px; font-family:  'Viner Hand ITC';"><b>of award to</b></h1>
    <div class="name my-4" style="font-family: 'Lucida Calligraphy'; font-size 32px; letter-spacing: 2px;" >
       {{ucwords(strtolower($application->user->name))}}
    </div>
    <h2>
        For successfully completing the {{$application->programme()->type}} on
        Digital Skills Workshop and Bootcamp Programme 
        and Passed all Required Skills Assessment.
    </h2>
    <div class="name my-4" style="font-family: 'Lucida Calligraphy';">
    {{ucwords(strtolower($application->programme()->title))}}
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-sm-3">
            {{ucwords(strtolower($application->programme()->programme->activeCoordinator()->user->name))}}<br>
            Programme Coordinator
            </div>
            <div class="col-sm-9">
                <table class="text">
                    <tr>
                        <td width="130">Center: </td>
                        <td>{{$application->schedule->center->name}}</td>
                    </tr>
                    <tr>
                        <td>Issued On:</td>
                        <td>{{date('d M, Y', strtotime($application->schedule->certificate_distribution_date))}}</td>
                    </tr>
                    <tr>
                        <td>Certificate No: </td>
                        <td>1234567</td>
                    </tr>
                    <tr>
                        <td>Registration No: </td>
                        <td>12345678</td>
                    </tr>
                </table>
            </div>
                <div class="mt-2 p-2 " style="margin-left: 0px; margin-right: 0px; background-color: rgb(128,255,159); color: black;"> 
                <div class="row">
                    <div class="col-sm-8 text text-justify">
                    This qualification is rated at <b>16 credit</b> hours and is equivalent to the qualification award abtain under Affiliation to 
                    Usmanu Danfodiyo University Consultancy Service (UDUCONS).  
                    </div>
                    <div class="col-sm-4">For verification: https://diswab.catsol.ng/verify-cert</div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
  <button onclick="downloadPDF()" class="btn btn-outline-success"><i class="fas fa-download"></i> Download</button>
  

  <!-- jsPDF library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script>
    async function downloadPDF() {
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF('landscape', 'pt', 'a4');

      await html2canvas(document.getElementById("certificate")).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const imgProps = doc.getImageProperties(imgData);
        const pdfWidth = doc.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
        doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        doc.save("certificate.pdf");
      });
    }
  </script>

  <!-- html2canvas for screen capture -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

@yield('content')
