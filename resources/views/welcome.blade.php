<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    </head>
<body>
    <header class="text-gray-700 bg-gray-900 body-font">
        <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
          <a class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">

            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
              </svg>


            <span class="ml-3 text-xl text-sky-500">MarketMate</span>
          </a>
          <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto">
            @if (Route::has('login'))
            @auth
                <a class="text-white mr-5text-lg" href="{{ url('/dashboard') }}" class="">Dashboard</a>
                @else
                    <a class="mr-5 text-lg text-white" href="{{ route('login') }}" class="">Log in</a>
                @if (Route::has('register'))
                    <a class="text-white mr-5text-lg" href="{{ route('register') }}" class="ml-4">Register</a>
                @endif
            @endauth
        @endif
          </nav>

        </div>
      </header>
      <div class="relative overflow-hidden bg-gray-900 isolate">
        <svg
          class="absolute inset-0 -z-10 h-full w-full stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
          aria-hidden="true">
          <defs>
            <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="100%" y="-1"
              patternUnits="userSpaceOnUse">
              <path d="M.5 200V.5H200" fill="none"></path>
            </pattern>
          </defs>
          <svg x="50%" y="-1" class="overflow-visible fill-gray-800/20">
            <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
              stroke-width="0"></path>
          </svg>
          <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)"></rect>
        </svg>
        <div
          class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
          aria-hidden="true">
          <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-20"
            style="clip-path:polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)">
          </div>
        </div>
        <div class="mt-[-50px] flex h-screen items-center justify-center">
          <div class="flex-shrink-0 max-w-full px-4 text-center lg:mx-0 lg:max-w-3xl lg:pt-8">
            <h1 class="mt-10 text-5xl font-bold tracking-tight text-white sm:text-6xl">
              Revolutionize
              <span class="text-sky-500">your Shopping Experience  </span> with
              <span class="text-sky-500">MarketMate</span>
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-300"> Whether you're a buyer or a seller, MarketMate is your go-to platform for convenient and hassle-free online shopping and selling in Zimbabwe. Sign up now and start exploring the exciting world of MarketMate!
            </p>
            <div class="flex items-center justify-center mt-5 gap-x-6">
              <a href="{{ route('register') }}"
                class="rounded-md bg-sky-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400"
                rel="noreferrer">Click here to get started →</a>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
