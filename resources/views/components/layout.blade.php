<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<style media="screen">
  html{
    scroll-behavior: smooth;
  }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center space-x-1.5">
                <a href="#subscribe" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>

                @guest()
                    <a href="/register" class="text-xs font-bold uppercase text-blue-500">Register</a>
                    <p class="text-xs font-semibold">or</p>
                    <a href="/login" class="text-xs font-bold uppercase text-blue-500">Login</a>
                @endguest

                    @auth()
                        <div class="relative lg:inline-flex rounded-xl">
                            <div x-data="{show: false}">
                                <div class="rounded-2xl px-3 py-2">
                                    <span class="text-green-500">Welcome, </span><h3 @click="show = !show" @click.away="show = false" class="inline cursor-pointer hover:bg-blue-500 hover:text-white px-3 py-2 rounded-2xl">{{ auth()->user()->user_name }}</h3>
                                </div>
                                <div x-show="show" class="py-2 absolute bg-gray-100 mt-1.5 rounded-xl w-full z-50">
                                    <span class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white"><a href="/admin/dashboard">Dashboard</a></span>
                                    <span class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white"><a href="/logout">Logout</a></span>
                                </div>
                            </div>
                        </div>
                    @endauth
            </div>
        </nav>

        {{$slot}}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                            @error('email')
                            <div>
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <button type="submit" id="subscribe"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(()=> show=false,4000)" x-show="show" class="fixed bg-green-500 mb-6 mr-6 bottom-0 right-0 rounded p-2 text-white pl-10 pr-10">
        <p>{{ session('success') }}</p>
    </div>
    @endif
</body>
