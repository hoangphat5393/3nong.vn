@extends('frontend.layouts.master')

@php
    $postTitle = is_array($post)
        ? $post['title'] ?? ($post['name'] ?? 'Bài viết')
        : $post->title ?? ($post->name ?? 'Bài viết');
    $postDesc = is_array($post) ? $post['description'] ?? '' : $post->description ?? '';
    $postContent = is_array($post) ? $post['content_html'] ?? ($post['content'] ?? '') : $post->content ?? '';
    $postImage = is_array($post) ? $post['image'] ?? '' : $post->image ?? '';
    $postDate = is_array($post)
        ? $post['date_primary'] ?? ''
        : (isset($post->created_at)
            ? Carbon\Carbon::parse($post->created_at)->format('d/m/Y')
            : '');
    $postKeyword = is_array($post) ? $post['seo_keyword'] ?? '' : $post->seo_keyword ?? '';
    $postCategories = is_array($post) ? $post['categories'] ?? [] : [];
    $postUser = is_array($post) ? $post['user'] ?? null : null;
@endphp

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $postTitle . ' - 3 Nông',
        'keywords' => $seo['seo_keyword'] ?? $postKeyword,
        'description' => $seo['seo_description'] ?? strip_tags($postDesc),
        'image' => get_image($postImage),
    ])
@endsection

@push('head-style')
    <style>
        .post-detail-wrapper {
            background: transparent;
            padding: 20px 0 40px;
        }

        .post-breadcrumb {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 18px;
        }

        .post-breadcrumb a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .post-breadcrumb a:hover {
            color: #ffd700;
        }

        .post-breadcrumb .separator {
            margin: 0 8px;
            color: rgba(255, 255, 255, 0.5);
        }

        .post-breadcrumb span:last-child {
            color: #ffffff;
            font-weight: 600;
        }

        .post-article {
            background: #fff;
            border-radius: 12px;
            padding: 32px 36px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        }

        .post-article .post-category-badge {
            display: inline-block;
            background: #e8f5e9;
            color: #2e7d32;
            font-size: 12px;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 20px;
            margin-bottom: 14px;
            text-decoration: none;
        }

        .post-article h1 {
            font-size: 1.85rem;
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1.3;
            margin-bottom: 14px;
        }

        .post-meta {
            font-size: 13px;
            color: #888;
            display: flex;
            align-items: center;
            gap: 18px;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 18px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .post-meta i {
            color: #2e7d32;
        }

        .post-author {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 22px;
        }

        .post-author img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e8f5e9;
        }

        .post-author .author-name {
            font-weight: 700;
            font-size: 14px;
            color: #333;
        }

        .post-author .author-label {
            font-size: 12px;
            color: #999;
        }

        .post-desc-block {
            background: #f1f8f1;
            border-left: 4px solid #2e7d32;
            border-radius: 0 8px 8px 0;
            padding: 14px 18px;
            margin-bottom: 24px;
            color: #1a3c1c;
            font-size: 15px;
            font-weight: 500;
            line-height: 1.7;
        }

        .post-body {
            font-size: 15.5px;
            line-height: 1.85;
            color: #2d2d2d;
        }

        .post-body h1,
        .post-body h2 {
            font-size: 1.4rem;
            font-weight: 800;
            margin-top: 28px;
            margin-bottom: 12px;
            color: #1a1a1a;
        }

        .post-body h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-top: 22px;
            margin-bottom: 10px;
            color: #2e7d32;
        }

        .post-body h4,
        .post-body h5,
        .post-body h6 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-top: 18px;
            margin-bottom: 8px;
            color: #333;
        }

        .post-body p {
            margin-bottom: 14px;
        }

        .post-body img {
            max-width: 100%;
            border-radius: 8px;
            margin: 10px 0;
        }

        .post-body ul,
        .post-body ol {
            padding-left: 22px;
            margin-bottom: 14px;
        }

        .post-body li {
            margin-bottom: 6px;
        }

        .post-body blockquote {
            border-left: 4px solid #2e7d32;
            padding: 10px 18px;
            color: #555;
            background: #f9f9f9;
            border-radius: 0 8px 8px 0;
            margin: 18px 0;
        }

        .post-body table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        .post-body table th,
        .post-body table td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            font-size: 14px;
        }

        .post-body table th {
            background: #e8f5e9;
            font-weight: 700;
        }

        .post-tags-share {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .post-tags .tag-label {
            font-size: 13px;
            font-weight: 700;
            color: #555;
            margin-right: 6px;
        }

        .post-tags a {
            display: inline-block;
            font-size: 12px;
            background: #f0f0f0;
            color: #555;
            padding: 3px 10px;
            border-radius: 14px;
            margin: 2px 3px;
            text-decoration: none;
            transition: background .2s;
        }

        .post-tags a:hover {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .post-share-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .post-share-buttons span {
            font-size: 13px;
            font-weight: 700;
            color: #555;
        }

        .btn-share {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-share.fb {
            background: #1877f2;
            color: #fff;
        }

        .btn-share.zalo {
            background: #0068ff;
            color: #fff;
            font-size: 11px;
        }

        /* Sidebar */
        .sidebar-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .sidebar-card .sidebar-title {
            font-size: 14px;
            font-weight: 800;
            color: #fff;
            background: #2e7d32;
            padding: 12px 18px;
            margin: 0;
            border-left: 4px solid #1b5e20;
        }

        .sidebar-card .sidebar-body {
            padding: 16px;
        }

        .sidebar-search-input {
            width: 100%;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 9px 14px;
            font-size: 14px;
            outline: none;
            transition: border .2s;
        }

        .sidebar-search-input:focus {
            border-color: #2e7d32;
        }

        .btn-search-submit {
            background: #2e7d32;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 9px 16px;
            font-size: 14px;
            cursor: pointer;
            white-space: nowrap;
        }

        .sidebar-post-item {
            display: flex;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
            text-decoration: none;
            color: inherit;
        }

        .sidebar-post-item:last-child {
            border-bottom: none;
        }

        .sidebar-post-item:hover .sidebar-post-title {
            color: #2e7d32;
        }

        .sidebar-post-thumb {
            width: 76px;
            height: 58px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .sidebar-post-title {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.45;
            color: #222;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color .2s;
        }

        .sidebar-post-date {
            font-size: 11px;
            color: #aaa;
            margin-top: 4px;
        }

        /* Related posts */
        .related-posts-section {
            margin-top: 32px;
        }

        .related-posts-section h3 {
            font-size: 1.2rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e8f5e9;
            position: relative;
        }

        .related-posts-section h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: #2e7d32;
        }

        .related-post-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: box-shadow .25s, transform .25s;
            text-decoration: none;
            display: block;
            color: inherit;
            height: 100%;
        }

        .related-post-card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.13);
            transform: translateY(-3px);
            color: inherit;
        }

        .related-post-card .rpc-img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            display: block;
        }

        .related-post-card .rpc-body {
            padding: 14px 16px 18px;
        }

        .related-post-card .rpc-date {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }

        .related-post-card .rpc-title {
            font-size: 14px;
            font-weight: 800;
            color: #111;
            text-transform: uppercase;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color .2s;
        }

        .related-post-card:hover .rpc-title {
            color: #2e7d32;
        }

        .related-posts-section {
            margin-top: 36px;
        }
    </style>
@endpush

@section('content')
    <div class="post-detail-wrapper">
        <div class="container">

            {{-- Breadcrumb --}}
            <div class="post-breadcrumb">
                <a href="{{ route('index') }}">Trang chủ</a>
                <span class="separator">/</span>
                <a href="{{ route('news') }}">Tin tức</a>
                @if (!empty($postCategories))
                    <span class="separator">/</span>
                    <a
                        href="{{ route('news.category', $postCategories[0]['slug'] ?? '#') }}">{{ $postCategories[0]['name'] ?? '' }}</a>
                @endif
                <span class="separator">/</span>
                <span>{{ Str::limit($postTitle, 60) }}</span>
            </div>

            <div class="row">
                {{-- Main Content --}}
                <div class="col-lg-8 mb-4">
                    <article class="post-article">
                        {{-- Category badge --}}
                        @if (!empty($postCategories))
                            <a href="{{ route('news.category', $postCategories[0]['slug'] ?? '#') }}"
                                class="post-category-badge">
                                {{ $postCategories[0]['name'] ?? '' }}
                            </a>
                        @endif

                        <h1>{{ $postTitle }}</h1>

                        {{-- Meta: date + author --}}
                        <div class="post-meta">
                            @if (!empty($postDate))
                                <span><i class="fa-regular fa-calendar-days me-1"></i> {{ $postDate }}</span>
                            @endif
                            @if (!empty($postUser))
                                <span><i class="fa-regular fa-user me-1"></i> {{ $postUser['name'] ?? '' }}</span>
                            @endif
                        </div>

                        {{-- Description/lead --}}
                        @if (!empty($postDesc))
                            <div class="post-desc-block">
                                {!! $postDesc !!}
                            </div>
                        @endif

                        {{-- Featured image --}}
                        @if (!empty($postImage))
                            <figure class="mb-4">
                                <img src="{{ get_image($postImage) }}" alt="{{ $postTitle }}" class="w-100 rounded"
                                    style="max-height:420px;object-fit:cover;">
                            </figure>
                        @endif

                        {{-- Article body --}}
                        <div class="post-body">
                            {!! $postContent !!}
                        </div>

                        {{-- Tags + share --}}
                        <div class="post-tags-share">
                            <div class="post-tags">
                                @if (!empty($postKeyword))
                                    <span class="tag-label">Tags:</span>
                                    @foreach (explode(',', $postKeyword) as $tag)
                                        <a
                                            href="{{ route('search') }}?keyword={{ urlencode(trim($tag)) }}">{{ trim($tag) }}</a>
                                    @endforeach
                                @endif
                            </div>
                            <div class="post-share-buttons">
                                <span>Chia sẻ:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    target="_blank" class="btn-share fb" title="Chia sẻ Facebook">f</a>
                                <a href="https://zalo.me/share/v2/post?url={{ urlencode(url()->current()) }}"
                                    target="_blank" class="btn-share zalo" title="Chia sẻ Zalo">Zalo</a>
                            </div>
                        </div>
                    </article>
                </div>

                {{-- Sidebar --}}
                <aside class="col-lg-4">
                    {{-- Search --}}
                    <div class="sidebar-card">
                        <h3 class="sidebar-title"><i class="fa-solid fa-magnifying-glass me-2"></i>Tìm kiếm</h3>
                        <div class="sidebar-body">
                            <form action="{{ route('search') }}" method="GET" class="d-flex gap-2">
                                <input type="text" name="keyword" placeholder="Tìm bài viết..."
                                    class="sidebar-search-input">
                                <button type="submit" class="btn-search-submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>

                    {{-- Latest posts --}}
                    @if (!empty($latest_posts) && count($latest_posts) > 0)
                        <div class="sidebar-card">
                            <h3 class="sidebar-title"><i class="fa-regular fa-clock me-2"></i>Bài Viết Mới Nhất</h3>
                            <div class="sidebar-body">
                                @foreach ($latest_posts as $item)
                                    @php
                                        $itemTitle = is_array($item)
                                            ? $item['title'] ?? ($item['name'] ?? '')
                                            : $item->title ?? ($item->name ?? '');
                                        $itemSlug = is_array($item) ? $item['slug'] ?? '' : $item->slug ?? '';
                                        $itemId = is_array($item) ? $item['id'] ?? '' : $item->id ?? '';
                                        $itemImg = is_array($item) ? $item['image'] ?? '' : $item->image ?? '';
                                        $itemDate = is_array($item)
                                            ? $item['date_primary'] ?? ''
                                            : (isset($item->created_at)
                                                ? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')
                                                : '');
                                    @endphp
                                    <a href="{{ route('news.detail', ['slug' => $itemSlug, 'id' => $itemId]) }}"
                                        class="sidebar-post-item">
                                        <img src="{{ get_image($itemImg) }}" alt="{{ $itemTitle }}"
                                            class="sidebar-post-thumb">
                                        <div>
                                            <div class="sidebar-post-title">{{ $itemTitle }}</div>
                                            <div class="sidebar-post-date"><i
                                                    class="fa-regular fa-calendar-days me-1"></i>{{ $itemDate }}</div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>

            {{-- Related posts full width --}}
            @if (!empty($related_posts) && count($related_posts) > 0)
                <div class="related-posts-section">
                    <h3>Bài viết liên quan</h3>
                    <div class="row">
                        @foreach ($related_posts as $related)
                            @php
                                $relTitle = is_array($related) ? $related['title'] ?? '' : $related->title ?? '';
                                $relSlug = is_array($related) ? $related['slug'] ?? '' : $related->slug ?? '';
                                $relId = is_array($related) ? $related['id'] ?? '' : $related->id ?? '';
                                $relImg = is_array($related) ? $related['image'] ?? '' : $related->image ?? '';
                                $relDate = is_array($related)
                                    ? $related['date_long'] ?? ($related['date_primary'] ?? '')
                                    : '';
                            @endphp
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('news.detail', ['slug' => $relSlug, 'id' => $relId]) }}"
                                    class="related-post-card">
                                    <img class="rpc-img" src="{{ get_image($relImg) }}" alt="{{ $relTitle }}"
                                        loading="lazy">
                                    <div class="rpc-body">
                                        <div class="rpc-date"><i
                                                class="fa-regular fa-calendar-days me-1"></i>{{ $relDate }}</div>
                                        <div class="rpc-title">{{ $relTitle }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
