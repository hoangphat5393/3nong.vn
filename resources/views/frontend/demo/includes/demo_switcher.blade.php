@props(['activeConcept' => 1])

<!-- STICKY DEMO CONTROLLER BAR (ALL 6 CONCEPTS) -->
<div id="demo-controller-bar" class="py-2 px-3 sticky-top shadow-lg" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); z-index: 999999; border-bottom: 2px solid #eab308; font-family: 'Nunito', sans-serif;">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
            <!-- Left Info -->
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-warning text-dark px-2.5 py-1 fs-7 fw-bold text-uppercase rounded-pill">
                    <i class="fa-solid fa-layer-group me-1"></i> BẢN XEM THỬ GIAO DIỆN (6 MẪU)
                </span>
                <span class="text-white small d-none d-xl-inline fw-semibold">
                    Đang xem: 
                    @if($activeConcept === 1)
                        <strong class="text-warning">Mẫu 1: Green & Sun Vitality (Nền Trắng Sứ)</strong>
                    @elseif($activeConcept === 2)
                        <strong class="text-emerald-400 text-info">Mẫu 2: Eco Clean & High-Tech (Nền Soft Mint)</strong>
                    @elseif($activeConcept === 3)
                        <strong class="text-danger text-warning">Mẫu 3: Dynamic Modern Retail (Nền Xám Sáng)</strong>
                    @elseif($activeConcept === 4)
                        <strong style="color: #4ade80;">Mẫu 4: Bento Grid & Glassmorphism (Layout Tương Lai)</strong>
                    @elseif($activeConcept === 5)
                        <strong style="color: #fde047;">Mẫu 5: Nordic Minimalist Luxury (Bắc Âu Tối Giản)</strong>
                    @elseif($activeConcept === 6)
                        <strong style="color: #38bdf8;">Mẫu 6: Mobile-First App Experience (Siêu Mượt & Stories)</strong>
                    @endif
                </span>
            </div>

            <!-- Switcher Buttons Grid -->
            <div class="d-flex flex-wrap align-items-center gap-1.5">
                <a href="{{ route('demo.concept1') }}" 
                   class="btn btn-sm rounded-pill fw-bold transition-all {{ $activeConcept === 1 ? 'btn-success shadow' : 'btn-outline-light' }}"
                   style="{{ $activeConcept === 1 ? 'background-color: #5E9C3C; border-color: #5E9C3C;' : 'font-size: 0.8rem;' }}"
                   title="Mẫu 1: Chuẩn Logo - Nền Trắng Sứ">
                    Mẫu 1
                </a>

                <a href="{{ route('demo.concept2') }}" 
                   class="btn btn-sm rounded-pill fw-bold transition-all {{ $activeConcept === 2 ? 'btn-info text-white shadow' : 'btn-outline-light' }}"
                   style="{{ $activeConcept === 2 ? 'background-color: #10B981; border-color: #10B981;' : 'font-size: 0.8rem;' }}"
                   title="Mẫu 2: Công nghệ cao - Nền Xanh Mầm">
                    Mẫu 2
                </a>

                <a href="{{ route('demo.concept3') }}" 
                   class="btn btn-sm rounded-pill fw-bold transition-all {{ $activeConcept === 3 ? 'btn-warning text-dark shadow' : 'btn-outline-light' }}"
                   style="{{ $activeConcept === 3 ? 'background-color: #FF5722; border-color: #FF5722; color: #fff !important;' : 'font-size: 0.8rem;' }}"
                   title="Mẫu 3: Sàn Bán Lẻ - Nền Xám">
                    Mẫu 3
                </a>

                <a href="{{ route('demo.concept4') }}" 
                   class="btn btn-sm rounded-pill fw-bold transition-all {{ $activeConcept === 4 ? 'shadow' : 'btn-outline-light' }}"
                   style="{{ $activeConcept === 4 ? 'background-color: #22C55E; border-color: #22C55E; color: #000 !important;' : 'font-size: 0.8rem; border-color: #4ade80; color: #4ade80;' }}"
                   title="Mẫu 4: Bento Grid & Glassmorphism Đẳng Cấp">
                    <i class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)
                </a>

                <a href="{{ route('demo.concept5') }}" 
                   class="btn btn-sm rounded-pill fw-bold transition-all {{ $activeConcept === 5 ? 'shadow' : 'btn-outline-light' }}"
                   style="{{ $activeConcept === 5 ? 'background-color: #D4AF37; border-color: #D4AF37; color: #000 !important;' : 'font-size: 0.8rem; border-color: #fde047; color: #fde047;' }}"
                   title="Mẫu 5: Bắc Âu Tối Giản Sang Trọng">
                    <i class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)
                </a>

                <a href="{{ route('demo.concept6') }}" 
                   class="btn btn-sm rounded-pill fw-bold transition-all {{ $activeConcept === 6 ? 'shadow' : 'btn-outline-light' }}"
                   style="{{ $activeConcept === 6 ? 'background-color: #00A86B; border-color: #00A86B; color: #fff !important;' : 'font-size: 0.8rem; border-color: #38bdf8; color: #38bdf8;' }}"
                   title="Mẫu 6: App Di Động Tốc Độ Cao & Stories">
                    <i class="fa-solid fa-mobile-screen me-1"></i> Mẫu 6 (App UI)
                </a>

                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary text-light rounded-pill ms-md-2" title="Quay lại giao diện cũ">
                    <i class="fa-solid fa-arrow-rotate-left"></i> Gốc
                </a>
            </div>
        </div>
    </div>
</div>
