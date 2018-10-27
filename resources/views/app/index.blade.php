@extends('app.layout')
@section('content')

<div class="flex leading-normal">
    <div class="w-1/4">
        <section class="font-sans p-8 pr-4">
            <folder-index :init-folders="{{ $folders }}"></folder-index>
        </section>
    </div>
    <div class="w-3/4">
        <section class="font-sans p-8">
            <router-view/>
        </section>
    </div>
</div>

@endsection
