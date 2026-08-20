@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => ($page->name ?? $page->title ?? 'Trang') . ' - 3 Nông',
        'keywords' => $page->seo_keyword ?? '',
        'description' => $page->seo_description ?? strip_tags($page->description ?? ''),
        'image' => isset($page->image) ? get_image($page->image) : get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h1 class="h2 fw-bold text-success mb-4 border-bottom pb-3">{{ $page->name ?? $page->title }}</h1>

                    @if (!empty($page->description))
                        <div class="lead fw-normal text-secondary mb-4 p-3 bg-light rounded border-start border-4 border-success">
                            {!! $page->description !!}
                        </div>
                    @endif

                    <div class="page-content-body">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
