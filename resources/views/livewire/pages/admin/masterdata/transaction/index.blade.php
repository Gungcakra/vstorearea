<div class="d-flex flex-column flex-column-fluid">
    <x-slot:title>Transaction Data</x-slot:title>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Transaction Data</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Transaction</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <div class="d-flex items-center">
                {{-- <input type="text" class="form-control form-control-solid" placeholder="Search Employee Name" id="search" autocomplete="off" wire:model.live.debounce.100ms="search" /> --}}

                {{-- <select class="form-select" data-control="select2" data-placeholder="Select Customer" name="departement_id" id="departement_id" onchange="@this.set('selectedDepartement', this.value)">
                    <option>Select Departement</option>
                    @forelse($departements as $item)
                        <option value="{{ $item->id }}" {{ $selectedDepartement == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @empty
                        <option value="">No Data</option>
                    @endforelse
                   
                </select> --}}
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                {{-- <a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a> --}}
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                {{-- <button class="btn btn-sm fw-bold btn-primary" href="{{ route('game.add') }}" wire:navigate>Add Game</button> --}}
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card p-5">
                <div class="flex w-full">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input
                            type="text"
                            data-kt-customer-table-filter="search"
                            class="form-control form-control-solid w-250px ps-12"
                            placeholder="Cari Game"
                            wire:model.live.debounce.100ms="search"
                        />
                    </div>
    
                </div>
                <div class="table-responsive">
                    <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                        <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th>No</th>
                                {{-- <th>Action</th> --}}
                                <th>Game</th>
                                <th>Email</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) < 1)
                            <tr>
                                <td colspan="5" class="text-center">No Data Found</td>
                            </tr>
                            @else
                            @foreach ($data as $index => $transaction)
                            <tr wire:key="transaction-{{ $transaction->id }}">
                                <td>{{ $index + 1 }}</td>
                                {{-- <td>
                                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('game.edit', $transaction->id) }}" class="menu-link px-3 w-100">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3 w-100" data-kt-ecommerce-product-filter="delete_row" wire:click="delete({{ $transaction->id }})">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td> --}}
                                <td>{{ $transaction->game->title }}</td>
                                <td>{{ $transaction->email }}</td>
                                <td>RP {{ number_format($transaction->price, 0, ',', '.') }}</td>
                                <td>{{ $transaction->payment_method }}</td>
                                <td>
                                    {{ $transaction->created_at->format('d M Y H:i') }}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
    
            </div>

        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        Livewire.on('show-modal', () => {
        var modalEl = document.getElementById('employeeModal');
        var existingModal = bootstrap.Modal.getInstance(modalEl);
        if (!existingModal) {
            var myModal = new bootstrap.Modal(modalEl, {});
            myModal.show();
        } else {
            existingModal.show();
        }
    });
    Livewire.on('hide-modal', () => {
        var modalEl = document.getElementById('employeeModal');
        var modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) {
            modal.hide();
            modal.dispose();
        }
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        modalEl.style.display = 'none';
        modalEl.setAttribute('aria-hidden', 'true');
        modalEl.removeAttribute('aria-modal');
        modalEl.removeAttribute('role');
        document.body.classList.remove('modal-open'); 
        document.body.style.overflow = ''; 
        document.body.style.paddingRight = ''; 

    });
    Livewire.on('confirm-delete', (message) => {
        Swal.fire({
            title: message
            , showCancelButton: true
            , confirmButtonText: "Yes"
            , cancelButtonText: "No"
            , icon: "warning"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteGameConfirmed');
            } else {
                Swal.fire("Dibatalkan", "Penghapusan Dibatalkan.", "info");
            }
        });
    });
    });



    
</script>
@endpush
