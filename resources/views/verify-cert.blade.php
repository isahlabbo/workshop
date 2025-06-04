<x-guest-layout>
    <x-jet-authentication-card>
    @section('title') 
    {{$certificate->no}} certificate verification
    @endsection
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
                            <h3>Certificate Details:</h3>
                            <p><strong>Name:</strong> {{$certificate->application->user->name}}</p>
                            <p><strong>Certificate ID:</strong> {{$certificate->no}}</p>
                            <p><strong>Registration No:</strong> {{$certificate->application->registration_no}}</p>
                            <p><strong>Issued On:</strong> {{date('d M, Y',strtotime($certificate->application->schedule->certificate_distribution_date))}}</p>
                            <p><strong>Issued By:</strong> Catsol Institute of Computer Technology</p>
                            <p><strong>Program:</strong> Digital Skills Workshops and Bootcamps</p>
                        </div>

                        <div class="footer">
                            For further assistance, contact us at support@example.com
                        </div>

                </div>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
