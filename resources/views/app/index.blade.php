@extends('app.layout')
@section('content')

<div class="flex leading-normal">
    <div class="w-1/4">
        <section class="font-sans p-8">
            <folder-index :init-folders="{{ $folders }}"></folder-index>
        </section>
    </div>
    <div class="w-3/4">
        <section class="font-sans p-8 pr-16">
            <h3 class="font-century text-lg text-grey mb-4">BOOKMARKS</h3>
            <p class="text-xl text-grey-darkest mb-4">Apple are charging higher than normal. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem.</p>
            <p class="text-xl text-grey-darkest mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem.</p>
            <p class="text-xl text-grey-darkest mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem.</p>
            <p class="text-xl text-grey-darkest mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore, labore ab error non quae iure sint facere! Quae debitis vitae vero autem.</p>
            <p class="text-xl text-grey-darkest mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque, nihil. Magnam corrupti iusto, dolorum nostrum inventore.</p>
        </section>
    </div>
</div>

@endsection
