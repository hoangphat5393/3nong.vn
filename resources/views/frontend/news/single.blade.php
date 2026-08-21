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
