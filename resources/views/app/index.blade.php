@extends('app.layout')
@section('content')

<div class="flex leading-normal">
    <div class="w-1/4">
        <section class="font-sans p-8">
            <h3 class="font-century text-lg text-grey mb-4">FOLDERS</h3>
            <div class="w-full h-auto bg-grey-lighter border-l-4 border-teal-lighter hover:bg-grey-light rounded-sm px-2 py-1 mb-2">
                Top Folder
            </div>
            {{-- <div class="w-full h-auto border-l-4 border-transparent hover:bg-grey-light rounded-sm px-2 py-1 mb-2">
                Jest
            </div> --}}

            {{-- @TODO: the way to get all of the child folders to display is to use recursive partial includes --}}
            @each('app._folder', $folders, 'folder', 'app._folders-none')
            {{-- <drag-over></drag-over> --}}
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
