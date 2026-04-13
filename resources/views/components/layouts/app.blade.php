<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.38),_transparent_24%),linear-gradient(135deg,_#19b8ed_0%,_#53d8ff_48%,_#15b3ea_100%)] text-slate-800">
        <div class="mx-auto min-h-screen max-w-7xl p-4 md:p-6">
            <div class="overflow-hidden rounded-[32px] border border-white/50 bg-white/55 shadow-[0_32px_80px_rgba(8,65,105,0.22)] backdrop-blur-xl">
                <div class="flex min-h-[calc(100vh-3rem)] flex-col lg:flex-row">
                    @isset($sidebar)
                        {{ $sidebar }}
                    @endisset

                    <main class="min-w-0 flex-1 px-4 py-5 md:px-6 md:py-6">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
