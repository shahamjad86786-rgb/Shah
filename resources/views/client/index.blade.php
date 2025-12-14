@extends('componet.layout')

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Clients</h3>
                <p class="text-subtitle text-muted">The Client List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-start">Client List</h4>
                        <div class="d-flex align-items-center">
                            <form action="" class="me-2">
                                <div class="form-group position-relative has-icon-left" style="margin-bottom: 0">
                                    <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Search..." value="{{ isset($search) ? $search : '' }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>

                            </form>
                            <a href="{{Route('admin.client.create')}}" class="btn btn-primary">Add Client</a>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%;">#</th>
                                        <th scope="col" style="width: 30%;">NAME</th>
                                        <th scope="col" style="width: 15%;">Dob</th>
                                        <th scope="col" style="width: 15%;">Aadhar</th>
                                        <th scope="col" style="width: 10%;">Phone</th>                                        
                                        <th scope="col" style="width: 15%;">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>

                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="{{ $item->profilePicture()->url ?? asset('assets/images/defulat-user.jpg') }}" style="width: 40px; height: 40px; object-fit: cover;">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</p>
                                                </div>
                                            </td>
                                            <td>{{ $item->dob->format('d-m-Y') }}</td>
                                            <td>
                                                {{ $item->aadhar }}
                                                <a href="{{ route('admin.client.aadhar-pdf', $item->id) }}" target="_blank" class="ms-2">
                                                    <i class="bi bi-file-earmark-plus-fill text-danger"></i>
                                                </a>
                                            </td>

                                            <td>
                                                <a target="_blank" href="https://wa.me/{{ $item->phone }}?text={{ urlencode('Hello ' . $item->fullName()) }}">
                                                    {{ $item->phone }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{Route('admin.client.edit', $item->id)}}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> 
                                                </a>
                                                <a href="{{Route('admin.client.delete', $item->id)}}" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No data found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <!-- Display pagination links -->
                        {{-- {{ $data->appends(['search' => $search])->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="createTenant" tabindex="-1" aria-labelledby="tenantModalLabel">
    <div class="modal-dialog d-flex align-items-center justify-content-center" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">Add Tenant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="tenantForm" action="{{ route('admin.client.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tenant Name</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Tenant Name" value="{{ old('name') }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="number" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="Enter Tenant phone" value="{{ old('phone') }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                            </div>
                        </div>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="flat" class="form-label">Select Flat</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select name="flat" id="flat" class="form-control @error('flat') is-invalid @enderror">
                                    <option value="">Select Flat</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-house"></i>
                                </div>
                            </div>
                        </div>
                        @error('flat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
