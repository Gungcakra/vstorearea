<div class="d-flex flex-column flex-column-fluid">
    <x-slot:title>Add Game</x-slot:title>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add Game</h1>
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
                    <a class="breadcrumb-item text-muted" href="{{ route('game') }}" wire:navigate>Game</a>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Add Game</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <div class="d-flex items-center">
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                {{-- <a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a> --}}
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                {{-- <button class="btn btn-sm fw-bold btn-primary" wire:click="create()">Add Employee</button> --}}
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
                <div class="row g-9 mb-8">
                    <!-- Game Title -->
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Title</span>
                        </label>
                        <input type="text" class="form-control form-control-solid @error('title') is-invalid @enderror" placeholder="Enter Title" wire:model="title" />
                    </div>
                    <!-- Game Description -->
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Description</span>
                        </label>
                        <input type="text" class="form-control form-control-solid @error('description') is-invalid @enderror" placeholder="Enter Description" wire:model="description" />
                    </div>
                    <!-- Game Price -->
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Price</span>
                        </label>
                        <input type="number" class="form-control form-control-solid @error('price') is-invalid @enderror" placeholder="Enter Price" wire:model="price" />
                    </div>
                </div>

                <!-- Minimum Spec -->
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. CPU</label>
                        <input type="text" class="form-control form-control-solid" placeholder="CPU" wire:model="min_cpu" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. RAM</label>
                        <input type="text" class="form-control form-control-solid" placeholder="RAM" wire:model="min_ram" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. Video Card</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Video Card" wire:model="min_video_card" />
                    </div>
                </div>
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. VRAM</label>
                        <input type="text" class="form-control form-control-solid" placeholder="VRAM" wire:model="min_vram" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. OS</label>
                        <input type="text" class="form-control form-control-solid" placeholder="OS" wire:model="min_os" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. DirectX</label>
                        <input type="text" class="form-control form-control-solid" placeholder="DirectX" wire:model="min_directx" />
                    </div>
                </div>
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. Pixel Shader</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Pixel Shader" wire:model="min_pixel_shader" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. Vertex Shader</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Vertex Shader" wire:model="min_vertex_shader" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. Network</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Network" wire:model="min_network" />
                    </div>
                </div>
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. Disk Space</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Disk Space" wire:model="min_disk_space" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Min. Note</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Note" wire:model="min_note" />
                    </div>
                </div>

                <!-- Recommended Spec -->
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. CPU</label>
                        <input type="text" class="form-control form-control-solid" placeholder="CPU" wire:model="rec_cpu" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. RAM</label>
                        <input type="text" class="form-control form-control-solid" placeholder="RAM" wire:model="rec_ram" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. Video Card</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Video Card" wire:model="rec_video_card" />
                    </div>
                </div>
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. VRAM</label>
                        <input type="text" class="form-control form-control-solid" placeholder="VRAM" wire:model="rec_vram" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. OS</label>
                        <input type="text" class="form-control form-control-solid" placeholder="OS" wire:model="rec_os" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. DirectX</label>
                        <input type="text" class="form-control form-control-solid" placeholder="DirectX" wire:model="rec_directx" />
                    </div>
                </div>
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. Pixel Shader</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Pixel Shader" wire:model="rec_pixel_shader" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. Vertex Shader</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Vertex Shader" wire:model="rec_vertex_shader" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. Network</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Network" wire:model="rec_network" />
                    </div>
                </div>
                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. Disk Space</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Disk Space" wire:model="rec_disk_space" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Rec. Note</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Note" wire:model="rec_note" />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Photo</label>
                        <div class="mb-3">
                            <input type="file" class="form-control form-control-solid @error('photo') is-invalid @enderror" wire:model="photo" accept="image/*" />
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if ($photo)
                                <div class="mt-3">
                                    <span class="fw-semibold d-block mb-2">Preview:</span>
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Photo Preview" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @elseif($id_game)
                                <div class="mt-3">
                                    <span class="fw-semibold d-block mb-2">Current Photo:</span>
                                    <img src="{{ asset('storage/' . $editPhoto) }}" alt="Current Photo" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @elseif($editPhoto && $photo)
                                <div class="mt-3">
                                    <span class="fw-semibold d-block mb-2">Current Photo:</span>
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Current Photo" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" wire:click="{{ $id_game ? 'update' : 'store' }}">
                        {{ $id_game ? 'Update' : 'Save' }}
                    </button>
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
                    Livewire.dispatch('deleteEmployee');
                } else {
                    Swal.fire("Cancelled", "Delete Cancelled.", "info");
                }
            });
        });
    });

</script>
@endpush
