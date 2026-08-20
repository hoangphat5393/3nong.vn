@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Tin Tức & Sự Kiện - 3 Nông',
        'keywords' => 'tin tuc 3nong, su kien 3nong, kiem nghiem nong nghiep',
        'description' => 'Cập nhật tin tức và kiến thức kỹ thuật nông nghiệp từ 3 Nông',
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="container py-4">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span>Tin tức & Sự kiện</span>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h1 class="block-title h3 mb-4 fw-bold text-success border-bottom pb-2">Tin Tức & Sự Kiện</h1>
            </div>
        </div>

        <div class="row">
            @if (!empty($posts) && count($posts) > 0)
                @foreach ($posts as $post)
                    @php
                        $postId = data_get($post, 'id');
                        $postSlug = data_get($post, 'slug') ?: Str::slug(data_get($post, 'name') ?: data_get($post, 'title') ?: '');
                        $postTitle = data_get($post, 'title') ?: data_get($post, 'name') ?: 'Bài viết';
                        $postImage = data_get($post, 'image') ?: data_get($post, 'avt_show_main_post') ?: get_image(setting_option('logo'));
                        $postDesc = data_get($post, 'description') ?: data_get($post, 'description_html') ?: '';
                    @endphp
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                            <a href="{{ route('news.detail', ['slug' => $postSlug, 'id' => $postId]) }}">
                                <img src="{{ get_image($postImage) }}" class="card-img-top" alt="{{ $postTitle }}" style="height: 220px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <h2 class="card-title h5 fw-bold">
                                    <a href="{{ route('news.detail', ['slug' => $postSlug, 'id' => $postId]) }}" class="text-dark text-decoration-none hover-success">
                                        {{ $postTitle }}
                                    </a>
                                </h2>
                                <p class="card-text text-muted small">
                                    {{ Str::limit(strip_tags((string) $postDesc), 120) }}
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pb-3">
                                <a href="{{ route('news.detail', ['slug' => $postSlug, 'id' => $postId]) }}" class="btn btn-outline-success btn-sm">
                                    Xem chi tiết <i class="fa-solid fa-angle-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Chưa có bài viết nào.</p>
                </div>
            @endif
        </div>

        @if (method_exists($posts, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection
