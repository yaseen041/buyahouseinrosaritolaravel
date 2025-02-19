@php
    $categories = getCategoryTreeWithPosts(14);
@endphp

@if($categories->count())
    @include('common.menu_ajax', ['categories' => $categories])
@endif
