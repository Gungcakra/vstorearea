<div class="d-flex flex-column flex-column-fluid">
    <x-slot:title>{{ $game->title }}</x-slot:title>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Checkout</h1>
                {{-- <input type="text" class="form-control form-control-solid" placeholder="Search User Name" id="search" autocomplete="off" wire:model.live.dobonce.300ms="search" /> --}}
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                {{-- <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white">
                        <a href="{{ route('dashboard') }}" class="text-white text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white">User</li>
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
            <div class="row justify-content-center align-items-start g-5">
                <!-- Left: Game Info -->
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-5">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center p-4">
                                <img src="{{ asset('storage/' . $game->photo) }}" class="img-fluid rounded-3 shadow" alt="{{ $game->title }}" style="max-height: 220px; object-fit: cover;">
                            </div>
                            <div class="col-md-8 p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h2 class="fw-bold mb-2 text-success">{{ $game->title }}</h2>
                                    <p class="text-white fs-6 mb-3">{{ $game->description }}</p>
                                </div>
                                <div>
                                    <span class="fs-4 fw-bold text-success">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right: Checkout Summary -->
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-4 p-4 sticky-top" style="top: 30px;">
                        <h4 class="fw-bold mb-4 text-success">Order Summary</h4>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold text-white">Game</span>
                            <span class="fw-semibold">{{ $game->title }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold text-white">Price</span>
                            <span class="fw-bold text-success">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fw-bold fs-5 text-success">Total</span>
                            <span class="fw-bold fs-5 text-success">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-success">Email Address</label>
                                <input type="email" class="form-control form-control-lg border-success" id="email" placeholder="Enter your email" wire:model="email" required />
                            </div>
                            <div class="m-0">
                                <!--begin::Title-->
                                <h1 class="fw-bold text-success mb-5">Payment Method</h1>
                                <!--end::Title-->

                                <!--begin::Radio group-->
                                <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                    <!-- Bank Transfer -->
                                    <label class="btn btn-active-text-success border border-3 border-gray-800 border-active-success btn-active-light-success w-100 px-4 {{ $payment === 'bank_transfer' ? 'active' : '' }}" data-kt-button="true">
                                        <input class="btn-check" type="radio" name="method" wire:click="setPayment('bank_transfer')" value="bank_transfer" wire:model="payment" />
                                        <i class="bi bi-bank2 fs-2hx mb-2 pe-0 text-success"></i>
                                        <span class="fs-7 fw-bold d-block text-success">Bank Transfer</span>
                                        <small class="d-block text-white-50">ATM, mBanking, iBanking</small>
                                    </label>

                                    <!-- E-Wallet -->
                                    <label class="btn btn-active-text-success border border-3 border-gray-800 border-active-success btn-active-light-success w-100 px-4 {{ $payment === 'ewallet' ? 'active' : '' }}" data-kt-button="true">
                                        <input class="btn-check" type="radio" name="method" wire:click="setPayment('ewallet')" value="ewallet" wire:model="payment" />
                                        <i class="bi bi-wallet2 fs-2hx mb-2 pe-0 text-success"></i>
                                        <span class="fs-7 fw-bold d-block text-success">E-Wallet</span>
                                        <small class="d-block text-white-50">OVO, GoPay, DANA</small>
                                    </label>

                                    <!-- Credit Card -->
                                    <label class="btn btn-active-text-success border border-3 border-gray-800 border-active-success btn-active-light-success w-100 px-4 {{ $payment === 'credit_card' ? 'active' : '' }}" data-kt-button="true">
                                        <input class="btn-check" type="radio" name="method" wire:click="setPayment('credit_card')" value="credit_card" wire:model="payment" />
                                        <i class="bi bi-credit-card-2-front fs-2hx mb-2 pe-0 text-success"></i>
                                        <span class="fs-7 fw-bold d-block text-success">Credit Card</span>
                                        <small class="d-block text-white-50">Visa, MasterCard</small>
                                    </label>
                                </div>
                            </div>

                            <button wire:click="buy" class="btn btn-success btn-lg w-100 rounded-pill fw-bold shadow mt-3">
                                <i class="bi bi-bag-check me-2"></i> Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
