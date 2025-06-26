<div class="d-flex flex-column flex-column-fluid">
    <x-slot:title>{{ $game->title }}</x-slot:title>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Game Detail</h1>
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
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-5">
                <div class="row g-0">
                    <div class="col-md-2 d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('storage/' . $game->photo) }}" class="img-fluid rounded-3 shadow" alt="{{ $game->title }}" style="max-height: 350px; object-fit: cover;">
                    </div>
                    <div class="col-md-7 p-5 d-flex flex-column justify-content-between">
                        <div>
                            <h2 class="fw-bold mb-3 text-dark">{{ $game->title }}</h2>
                            <p class="text-white fs-5 mb-4">{{ $game->description }}</p>
                            <div class="mb-4">
                                <span class="fs-4 fw-bold text-success">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a wire:navigate href="{{ route('checkout', $game->id) }}" class="btn border border-success  rounded-pill px-5 py-3 fw-semibold shadow-sm text-white">
                                <i class="bi bi-cart-plus text-white" ></i> Buy
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Game Specs --}}
            @if($game->specs && $game->specs->count())
                <div class="card border-0 shadow rounded-4 mb-5">
                    <div class="card-body p-5">
                        <h4 class="fw-bold mb-4 text-success">System Requirements</h4>
                        <div class="row">
                            @foreach(['minimum' => 'Minimum', 'recommended' => 'Recommended'] as $type => $label)
                                @php
                                    $spec = $game->specs->where('type', $type)->first();
                                @endphp
                                <div class="col-md-6 mb-4">
                                    <div class=" rounded-3 p-4 h-100">
                                        <h6 class="fw-semibold mb-3 text-uppercase text-success">{{ $label }}</h6>
                                        @if($spec)
                                            <ul class="list-unstyled mb-0">
                                                <li><strong>CPU:</strong> {{ $spec->cpu }}</li>
                                                <li><strong>RAM:</strong> {{ $spec->ram }}</li>
                                                <li><strong>Video Card:</strong> {{ $spec->video_card }}</li>
                                                @if($spec->vram)<li><strong>VRAM:</strong> {{ $spec->vram }}</li>@endif
                                                <li><strong>OS:</strong> {{ $spec->os }}</li>
                                                @if($spec->directx)<li><strong>DirectX:</strong> {{ $spec->directx }}</li>@endif
                                                @if($spec->pixel_shader)<li><strong>Pixel Shader:</strong> {{ $spec->pixel_shader }}</li>@endif
                                                @if($spec->vertex_shader)<li><strong>Vertex Shader:</strong> {{ $spec->vertex_shader }}</li>@endif
                                                @if($spec->network)<li><strong>Network:</strong> {{ $spec->network }}</li>@endif
                                                @if($spec->disk_space)<li><strong>Disk Space:</strong> {{ $spec->disk_space }}</li>@endif
                                                @if($spec->note)<li class="mt-2 text-success"><em>{{ $spec->note }}</em></li>@endif
                                            </ul>
                                        @else
                                            <span class="text-muted">Not available</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
</div>
