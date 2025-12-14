<?php $__env->startSection('content'); ?>
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3 text-primary"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-primary"><?php echo e(isset($data) ? 'Update' : 'Create'); ?> Client</h3>
                <p class="text-subtitle text-muted"><?php echo e(isset($data) ? 'Update the client with all required details.' : 'Add a new client to the system with all required details.'); ?></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.client.index')); ?>">Tenants</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(isset($data) ? 'Update' : 'Create'); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <form id="tenantForm" method="POST" action="<?php echo e(isset($data) ? route('admin.client.update', $data->id) : route('admin.client.store')); ?>"
      enctype="multipart/form-data">

    <?php echo csrf_field(); ?>
    <div class="row g-4">


        <!-- ===========================
                Error Print
        ============================ -->
        <?php if($errors->any()): ?>
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 rounded-4 text-center p-3">
                <p class="text-primary fw-bold">Errors</p>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="text-danger mb-1"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>


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
                               placeholder="First name" value="<?php echo e(old('first_name', $data->first_name ?? '')); ?>">
                        <input type="text" name="middle_name" class="form-control"
                               placeholder="Middle name" value="<?php echo e(old('middle_name', $data->middle_name ?? '')); ?>">
                        <input type="text" name="last_name" class="form-control"
                               placeholder="Last name" value="<?php echo e(old('last_name', $data->last_name ?? '')); ?>">
                    </div>
                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                    <!-- Father Name -->
                    <label class="form-label text-primary mt-3">Father Name</label>
                    <div class="input-group mb-3">
                        <input type="text" name="father_first_name" class="form-control"
                               placeholder="First name" value="<?php echo e(old('father_first_name', $data->father_first_name ?? '')); ?>">
                        <input type="text" name="father_middle_name" class="form-control"
                               placeholder="Middle name" value="<?php echo e(old('father_middle_name', $data->father_middle_name ?? '')); ?>">
                        <input type="text" name="father_last_name" class="form-control"
                               placeholder="Last name" value="<?php echo e(old('father_last_name', $data->father_last_name ?? '')); ?>">
                    </div>
                    <?php $__errorArgs = ['father_first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['father_last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                    <!-- DOB + Aadhar -->
                    <div class="row mb-3">
                        <div class="col-4">
                            <label class="form-label text-primary">DOB</label>
                            <input type="date" name="dob" class="form-control"
                                   value="<?php echo e(old('dob', isset($data->dob) ? \Carbon\Carbon::parse($data->dob)->format('Y-m-d') : '')); ?>">
                            <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-4">
                            <label class="form-label text-primary">Aadhar</label>
                            <input type="number" name="aadhar" class="form-control" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   value="<?php echo e(old('aadhar', $data->aadhar ?? '')); ?>">
                            <?php $__errorArgs = ['aadhar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-4">
                            <label class="form-label text-primary">Pan Card</label>
                            <input type="text" name="pancard" class="form-control" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   value="<?php echo e(old('pancard', $data->pancard ?? '')); ?>">
                            <?php $__errorArgs = ['pancard'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Phone + Email -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label text-primary">Phone</label>
                            <input type="number" name="phone" class="form-control" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   value="<?php echo e(old('phone', $data->phone ?? '')); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-6">
                            <label class="form-label text-primary">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?php echo e(old('email', $data->email ?? '')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>


                    <!-- Address -->
                    <div class="row g-3">

                        <div class="col-2">
                            <label class="form-label text-primary">House No</label>
                            <input type="text" name="house_no" class="form-control"
                                   value="<?php echo e(old('house_no', $data->address->house_no ?? '')); ?>">
                            <?php $__errorArgs = ['house_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Building</label>
                            <input type="text" name="building" class="form-control"
                                   value="<?php echo e(old('building', $data->address->building ?? '')); ?>">
                            <?php $__errorArgs = ['building'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Street</label>
                            <input type="text" name="street" class="form-control"
                                   value="<?php echo e(old('street', $data->address->street ?? '')); ?>">
                            <?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Landmark</label>
                            <input type="text" name="landmark" class="form-control"
                                   value="<?php echo e(old('landmark', $data->address->landmark ?? '')); ?>">
                            <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">Area</label>
                            <input type="text" name="area" class="form-control"
                                   value="<?php echo e(old('area', $data->address->area ?? '')); ?>">
                            <?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">City</label>
                            <input type="text" name="city" class="form-control"
                                   value="<?php echo e(old('city', $data->address->city ?? '')); ?>">
                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-3">
                            <label class="form-label text-primary">State</label>
                            <input type="text" name="state" class="form-control"
                                   value="<?php echo e(old('state', $data->address->state ?? '')); ?>">
                            <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-2">
                            <label class="form-label text-primary">Pin Code</label>
                            <input type="text" name="pin_code" class="form-control"
                                   value="<?php echo e(old('pin_code', $data->address->pin_code ?? '')); ?>">
                            <?php $__errorArgs = ['pin_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ============================
             IMAGE UPLOAD SECTIONS
        ============================ -->
        <?php
            $default = asset('assets/images/defulat-user.jpg');
        ?>

        <!-- Passport -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Passport Picture</p>
                <img id="profilePreview"
                     src="<?php echo e(isset($data) ? $data->profilePicture()->url ?? $default : $default); ?>"
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
                     src="<?php echo e(isset($data) ? $data->signature()?->url ?? $default  : $default); ?>"
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
                     src="<?php echo e(isset($data) ? $data->aadharFront()?->url ?? $default  : $default); ?>"
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
                     src="<?php echo e(isset($data) ? $data->aadharBack()?->url ?? $default  : $default); ?>"
                     class="img-fluid">
                <input type="file" name="aadhar_back" id="aadhar_back" class="form-control d-none" onchange="previewImage(this,'aadharBackPreview')">
            </div>
        </div>

        <!-- PAN Card -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Pan Card</p>
                <img id="panCardPreview"
                     src="<?php echo e(isset($data) ? $data->panCard()?->url ?? $default  : $default); ?>"
                     class="img-fluid">
                <input type="file" name="pan_card" id="pan_card"
                       class="form-control d-none" onchange="previewImage(this,'panCardPreview')">
            </div>
        </div>

        <!-- PAN Card Receipt -->
        <div class="col-lg-2">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <p class="text-primary">Pan Card Receipt</p>
                <img id="panCardReceiptPreview"
                     src="<?php echo e(isset($data) ? $data->panCardReceipt()?->url ?? $default  : $default); ?>"
                     class="img-fluid">
                <input type="file" name="pan_card_receipt" id="pan_card_receipt" class="form-control d-none" onchange="previewImage(this,'panCardReceiptPreview')">
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

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
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>

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
            $('#aadhar_front').trigger('click');
        });
        
        $('#aadharBackPreview').on('click', function () {
            console.log('asd');
            $('#aadhar_back').trigger('click');
        });

        $('#panCardPreview').on('click', function () {
            $('#pan_card').trigger('click');
        });

        $('#uploadImage').on('click', function () {
            $('#fileInput').trigger('click'); // Simulate file input click
        });

        $('#panCardReceiptPreview').on('click', function () {
            $('#pan_card_receipt').trigger('click'); // Simulate file input click
        });

        

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('componet.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\shah\resources\views/client/create.blade.php ENDPATH**/ ?>