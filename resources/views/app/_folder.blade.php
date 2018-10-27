<div class="ml-6 ">
    <div class="w-auoto h-auto border-l-4 border-transparent hover:bg-grey-light rounded-sm px-2 py-1 mb-2">
        {{ $folder->title }}
    </div>
    @if ($folder->hasChildren())
        @foreach($folder->children as $folder)
            @include('app._folder', $folder)
        @endforeach
    @endif
</div>


{{-- <form action="/folder" method="POST">
    @csrf
    <input type="hidden" value="{{ $folder->id }}" name="parent_id">
    <input class="bg-grey-light appearance-none border-2 border-grey-light rounded w-full py-2 px-4 my-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" name="folder_title" type="text" placeholder="New folder...">
    <button class="shadow bg-purple hover:bg-purple-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Add Folder
    </button>
</form> --}}

{{-- <li class="font-sans text-lg">
    {{ $folder->title }}
    @if ($folder->hasChildren()) --}}
    {{-- <form action="/folder" method="POST">
        @csrf
        <input type="hidden" value="{{ $folder->id }}" name="parent_id">
        <input class="bg-grey-light appearance-none border-2 border-grey-light rounded w-full py-2 px-4 my-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" name="folder_title" type="text" placeholder="New folder...">
        <button class="shadow bg-purple hover:bg-purple-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Add Folder
        </button>
    </form> --}}
    {{-- <ul>
        @foreach($folder->children as $folder)
            @include('app._folder', $folder)
        @endforeach
    </ul>
    @endif
</li> --}}
