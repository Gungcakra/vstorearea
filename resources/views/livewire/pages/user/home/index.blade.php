<div class="d-flex flex-column flex-column-fluid">
    <x-slot:title>VSOTREAREA</x-slot:title>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Games</h1>
                 {{-- <input type="text" class="form-control form-control-solid" placeholder="Search User Name" id="search" autocomplete="off" wire:model.live.dobonce.300ms="search" /> --}}
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                {{-- <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
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
                    <li class="breadcrumb-item text-muted">User</li>
                    <!--end::Item-->
                </ul> --}}
                <!--end::Breadcrumb-->
            </div>
            <div class="d-flex items-center">
                {{-- <input type="text" class="form-control form-control-solid" placeholder="Search User Name" id="search" autocomplete="off" wire:model.live.dobonce.300ms="search" /> --}}
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                {{-- <a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a> --}}
                <!--end::Secondary button-->
                <!--begin::Primary button-->
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
                <div class="row row-cols-1 row-cols-md-4 d-flex justify-content-center gap-2">
                    @foreach($games as $game)
                    <a href="{{ route('game.detail', $game->id) }}" class="card h-100 shadow-sm border-0 rounded-4" style="max-width: 200px;">
                        <img src="{{ asset('storage/' . $game->photo) }}" class="card-img-top rounded-top-4" alt="{{ $game->title }}" style="object-fit:cover; height:260px;">
                        <div class=" m-2 d-flex flex-column">
                            <h5 class="card-title fw-bold mb-2">{{ $game->title }}</h5>
                            <p class="card-text text-success fs-5 mb-3 fw-bold">Rp {{ number_format($game->price, 0, ',', '.') }}</p>
                            {{-- <a wire:click="detail({{ $game->id }})" class="btn btn-gradient-success mt-auto rounded-pill px-4 py-2 fw-semibold">
                                Detail
                            </a> --}}
                        </div>
                    </a>
                        
                    @endforeach
                </div>

            </div>


        </div>
    </div>
</div>
