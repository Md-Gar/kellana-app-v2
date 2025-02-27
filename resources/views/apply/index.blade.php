<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Apply For Services') }}
        </h2>
    </x-slot>
    <br>
    <div class="container">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card p-3 text-center shadow-sm h-100 d-flex flex-column">
                    <img src="{{asset('images/dialysis.jpeg')}}" style="width: 90px; height: auto;" class="card-img-top mx-auto d-block" alt="Program Image">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">{{$variable = "Kidney Dialysis"}}</h3>
                        <p class="card-text flex-grow-1">We provide access to dialysis treatment for patients with kidney failure, ensuring they receive regular and quality care.</p>
                        <a href="{{ route('nextView', ['variable' => $variable]) }}" class="btn btn-danger mt-auto">Apply Now</a>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center shadow-sm h-100 d-flex flex-column">
                    <img src="{{asset('images/planting.jpeg')}}" style="width: 90px; height: auto;" class="card-img-top mx-auto d-block" alt="Program Image">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">Kidney Transplanting</h3>
                        <p class="card-text flex-grow-1">Our program supports kidney transplant procedures, helping patients receive a new lease on life through organ donation.</p>
                        <a href="#" class="btn btn-danger mt-auto">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center shadow-sm h-100 d-flex flex-column">
                    <img src="{{asset('images/bus.jpeg')}}" style="width: 90px; height: auto;" class="card-img-top mx-auto d-block" alt="Program Image">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">Transportation Allowance</h3>
                        <p class="card-text flex-grow-1">We offer financial support for transportation, ensuring patients can travel to medical appointments and treatments without financial burden.</p>
                        <a href="#" class="btn btn-danger mt-auto">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center shadow-sm h-100 d-flex flex-column">
                    <img src="{{asset('images/medication.jpeg')}}" style="width: 90px; height: auto;" class="card-img-top mx-auto d-block" alt="Program Image">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">Medication After Transplant</h3>
                        <p class="card-text flex-grow-1">We assist transplant recipients in obtaining essential post-transplant medications to prevent organ rejection and maintain health.</p>
                        <a href="#" class="btn btn-danger mt-auto">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center shadow-sm h-100 d-flex flex-column">
                    <img src="{{asset('images/hiring.jpeg')}}" style="width: 90px; height: auto;" class="card-img-top mx-auto d-block" alt="Program Image">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">Hiring Support</h3>
                        <p class="card-text flex-grow-1">We help kidney patients and survivors find suitable job opportunities, promoting financial independence and stability.</p>
                        <a href="#" class="btn btn-danger mt-auto">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center shadow-sm h-100 d-flex flex-column">
                    <img src="{{asset('images/education.jpeg')}}" style="width: 90px; height: auto;" class="card-img-top mx-auto d-block" alt="Program Image">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">Education</h3>
                        <p class="card-text flex-grow-1">Our educational programs raise awareness about kidney health, transplantation, and post-transplant care, empowering patients and their families.</p>
                        <a href="#" class="btn btn-danger mt-auto">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>