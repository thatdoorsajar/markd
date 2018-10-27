<form action="/folder" method="POST">
    @csrf
    <input type="hidden" value="1" name="parent_id">
    <input class="bg-grey-light appearance-none border-2 border-grey-light rounded w-full py-2 px-4 my-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" name="folder_title" type="text" placeholder="New folder...">
    <button class="shadow bg-purple hover:bg-purple-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Add Folder
    </button>
</form>
