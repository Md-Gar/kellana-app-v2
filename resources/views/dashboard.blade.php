<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Patients Gate') }}
        </h2>
    </x-slot>

    <div class="py-12 d-flex justify-content-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container d-flex justify-content-center align-items-center">
                    <!-- Larger Card to Wrap the Smaller Cards -->
                    <div class="card w-50 w-sm-75 p-3 shadow">
                        <div class="card-header text-center">
                            <h5 class="card-title text-center">Welcome to Kellana Patients Gate</h5>
                            <p class="card-text text-center">Your one-stop solution for all your medical needs. At Kellana, we streamline the process of applying for medical services and tracking your application status with ease.</p>

                        </div>
                       
                          
                            <div class="card-body">
                                <div class="row row-cols-1 row-cols-md-2 g-3">
                                    <!-- Apply for Service Card -->
                                    <div class="col">
                                        <div class="small-card">
                                            <img src="{{ asset('images/3874674_health_medical_medical record_icon (1).png') }}" class="card-img-top" style="height: 256px; width: 100%;" alt="Apply for Service">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Submit your application</h5>
                                                <p class="card-text">Fill in the necessary details to apply for the service.</p>
                                                <a href="{{ route('apply')}}" class="btn btn-danger">Apply Now</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Application Status Card -->
                                    <div class="col">
                                        <div class="small-card">
                                            <img src="{{ asset('images/5859123_checklist_clipboard_healthcare_medical_report_icon.png') }}" class="card-img-top" style="height: 256px; width: 100%;" alt="Check Application Status">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Track your application</h5>
                                                <p class="card-text">Check the status of your previous applications here.</p>
                                                <a href="{{ url('/check-status') }}" class="btn btn-danger">Check Status</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End of row -->
                            </div>
                        </div>
                    </div> <!-- End of main card -->
                </div> <!-- End of container -->
            </div> <!-- End of Breeze card -->
        </div> <!-- End of max-w-7xl -->
    </div> <!-- End of py-12 -->
</x-app-layout>
