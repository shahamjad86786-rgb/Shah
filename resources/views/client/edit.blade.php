@extends('componet.layout')

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3 text-primary"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-primary">{{ isset($data) ? 'Update' : 'Create' }} Client</h3>
                <p class="text-subtitle text-muted">{{ isset($data) ? 'Update the tenant with all required details.' : 'Add a new tenant to the system with all required details.' }}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Tenants</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ isset($data) ? 'Update' : 'Create' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <form id="tenantForm" method="POST"
      action="{{ isset($data) ? route('admin.client.update', $data->id) : route('admin.client.store') }}"
      enctype="multipart/form-data">

    @csrf
    <div class="row g-4">

        
        @if(session('any_error'))
            @foreach(session('any_error') as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        <!-- ===========================
             MAIN CLIENT INFORMATION
        ============================ -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">

                    <!-- Client Name -->
                    <label class="form-label text-primary">Client Name</label>
                    <div class="input-group mb-3">
                        <input type="text" name="first_name" class="form-control"
                               placeholder="First name" value="{{ old('first_name', $data->first_name ?? '') }}">
                        <input type="text" name="middle_name" class="form-control"
                               placeholder="Middle name" value="{{ old('middle_name', $data->middle_name ?? '') }}">
                        <input type="text" name="last_name" class="form-control"
                               placeholder="Last name" value="{{ old('last_name', $data->last_name ?? '') }}">
                    </div>
                    @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                    @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror


                    <!-- Father Name -->
                    <label class="form-label text-primary mt-3">Father Name</label>
                    <div class="input-group mb-3">
                        <input type="text" name="father_first_name" class="form-control"
                               placeholder="First name" value="{{ old('father_first_name', $data->father_first_name ?? '') }}">
                        <input type="text" name="father_middle_name" class="form-control"
                               placeholder="Middle name" value="{{ old('father_middle_name', $data->father_middle_name ?? '') }}">
                        <input type="text" name="father_last_name" class="form-control"
                               placeholder="Last name" value="{{ old('father_last_name', $data->father_last_name ?? '') }}">
                    </div>
                    @error('father_first_name') <small class="text-danger">{{ $message }}</small> @enderror
                    @error('father_last_name') <small class="text-danger">{{ $message }}</small> @enderror


                    <!-- DOB + Aadhar -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label text-primary">DOB</label>
                            <input type="date" name="dob" class="form-control"
                                   value="{{ old('dob', isset($data->dob) ? \Carbon\Carbon::parse($data->dob)->format('Y-m-d') : '') }}">
                            @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label text-primary">Aadhar</label>
                            <input type="number" name="aadhar" class="form-control"
                                   value="{{ old('aadhar', $data->aadhar ?? '') }}">
                            @error('aadhar') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Phone + Email -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label text-primary">Phone</label>
                            <input type="number" name="phone" class="form-control"
                                   value="{{ old('phone', $data->phone ?? '') }}">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label text-primary">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $data->email ?? '') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>


                    <!-- Address -->
                    <div class="row g-3">

                        <div class="col-2">
                            <label class="form-label text-primary">House No</label>
                            <input type="text" name="house_no" class="form-control"
                                   value="{{ old('house_no', $data->address->house_no ?? '') }}">
                            @error('house_no') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Building</label>
                            <input type="text" name="building" class="form-control"
                                   value="{{ old('building', $data->address->building ?? '') }}">
                            @error('building') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Street</label>
                            <input type="text" name="street" class="form-control"
                                   value="{{ old('street', $data->address->street ?? '') }}">
                            @error('street') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Landmark</label>
                            <input type="text" name="landmark" class="form-control"
                                   value="{{ old('landmark', $data->address->landmark ?? '') }}">
                            @error('landmark') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Area</label>
                            <input type="text" name="area" class="form-control"
                                   value="{{ old('area', $data->address->area ?? '') }}">
                            @error('area') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">City</label>
                            <input type="text" name="city" class="form-control"
                                   value="{{ old('city', $data->address->city ?? '') }}">
                            @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">State</label>
                            <input type="text" name="state" class="form-control"
                                   value="{{ old('state', $data->address->state ?? '') }}">
                            @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-2">
                            <label class="form-label text-primary">Pin Code</label>
                            <input type="text" name="pin_code" class="form-control"
                                   value="{{ old('pin_code', $data->address->pin_code ?? '') }}">
                            @error('pin_code') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ============================
             IMAGE UPLOAD SECTIONS
        ============================ -->
        @php
            $default = asset('assets/images/defulat-user.jpg');
        @endphp

        <!-- Passport -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Passport Picture</p>
                <img id="profilePreview"
                     src="{{ isset($data) && $data->profilePicture()->url ? $data->profilePicture()->url : $default }}"
                     class="img-fluid">
                <input type="file" name="passport_picture" id="passport_picture"
                       class="form-control d-none" onchange="previewImage(this,'profilePreview')">
            </div>
        </div>

        <!-- Signature -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Signature</p>
                <img id="signaturePreview"
                     src="{{ isset($data) && $data->signature ? Storage::url($data->signature) : $default }}"
                     class="img-fluid">
                <input type="file" name="signature" id="signature"
                       class="form-control d-none" onchange="previewImage(this,'signaturePreview')">
            </div>
        </div>

        <!-- Aadhar Front -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Aadhar Front</p>
                <img id="aadharFrontPreview"
                     src="{{ isset($data) && $data->aadhar_front ? Storage::url($data->aadhar_front) : $default }}"
                     class="img-fluid">
                <input type="file" name="aadhar_front" id="aadhar_front"
                       class="form-control d-none" onchange="previewImage(this,'aadharFrontPreview')">
            </div>
        </div>

        <!-- Aadhar Back -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Aadhar Back</p>
                <img id="aadharBackPreview"
                     src="{{ isset($data) && $data->aadhar_back ? Storage::url($data->aadhar_back) : $default }}"
                     class="img-fluid">
                <input type="file" name="aadhar_back" id="aadhar_back"
                       class="form-control d-none" onchange="previewImage(this,'aadharBackPreview')">
            </div>
        </div>

        <!-- PAN Card -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Pan Card</p>
                <img id="panCardPreview"
                     src="{{ isset($data) && $data->pan_card ? Storage::url($data->pan_card) : $default }}"
                     class="img-fluid">
                <input type="file" name="pan_card" id="pan_card"
                       class="form-control d-none" onchange="previewImage(this,'panCardPreview')">
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
            <a href="javascript:window.history.back()" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

    </div>
</form>

        </div>
    </section>
</div>
@endsection

@push('styles')

    <style>
        /* General Styles */
        .documents-img {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }

        .documents-img img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .documents-img:hover img {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Close Button Styles */
        .remove-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            cursor: pointer;
            visibility: hidden;
        }

        .documents-img:hover .remove-btn {
            visibility: visible;
            z-index: 1050;
        }

        /* Upload Placeholder Styling */
        .upload-placeholder {
            cursor: pointer;
            width: 150px;
            height: 150px;
            object-fit: contain;
        }
    </style>
@endpush
@push('scripts')

    <script>

        function previewImage(input, targetId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById(targetId).src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function documentPreviews(input) {
            const previewsContainer = document.getElementById('documentsPreview');
            previewsContainer.innerHTML = ''; // Clear the container

            if (input.files && input.files.length > 0) {
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        // Dynamically generate the preview content
                        const previewHTML = `
                        <div class="col-6 documents-img position-relative mb-3">
                            <a href="${e.target.result}" data-fancybox="gallery" data-caption="Document">
                                <img src="${e.target.result}" class="img-fluid shadow" alt="Document">
                            </a>
                        </div>`;
                        previewsContainer.innerHTML += previewHTML;
                    };
                    reader.readAsDataURL(file);
                });
            }
        }



        $('.documents-img').hover(
            function () {
                $(this).find('.remove-btn i').removeClass('d-none'); // Show close button
            },
            function () {
                $(this).find('.remove-btn i').addClass('d-none'); // Hide close button
            }
        );

        // Trigger file input click on image click
        $('#profilePreview').on('click', function () {
            $('#passport_picture').trigger('click');
        });

        $('#signaturePreview').on('click', function () {
            $('#signature').trigger('click');
        });

        $('#aadharFrontPreview').on('click', function () {
            $('#aadharFront').trigger('click');
        });
        
        $('#aadharbackPreview').on('click', function () {
            $('#aadharback').trigger('click');
        });

        $('#panCardPreview').on('click', function () {
            $('#panCard').trigger('click');
        });

        $('#uploadImage').on('click', function () {
            $('#fileInput').trigger('click'); // Simulate file input click
        });


        

    </script>
@endpush