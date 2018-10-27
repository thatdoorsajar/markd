{{-- <div class="w-full h-1 bg-teal"></div> --}}
<nav class="flex items-center justify-between bg-white border-b-2 border-grey-lighter py-4 px-8">
    <div class="flex items-center flex-no-shrink mr-6">
        <router-link to="/" class="no-underline grey-80 hover:grey-0">
            <img src="/svg/logo-head.svg" alt="Markd Logo" width="100">
        </router-link>
    </div>
    <div class="block">
        @guest
        <a href="/sign-in" class="font-semibold font-sans text-lg no-underline text-grey-darkest hover:text-purple mr-4">
            Sign In
        </a>
        <a href="/sign-up" class="font-semibold font-sans text-lg no-underline text-white bg-purple-light hover:bg-purple rounded-full py-2 px-4">
            Sign Up
        </a>
        @endguest
        @auth
        <user-menu :user="{{ $currentUser }}"/>
        @endauth
    </div>
</nav>
