<!DOCTYPE html>
<html dir="{{ language()->direction() }}" lang="{{ app()->getLocale() }}">
    <x-layouts.install.head>
        <x-slot name="title">
            {!! !empty($title->attributes->has('title')) ? $title->attributes->get('title') : $title !!}
        </x-slot>
    </x-layouts.install.head>

    <body class="bg-gray-50 text-gray-800 antialiased font-sans">
        @stack('body_start')

        <div class="min-h-screen flex items-center justify-center bg-no-repeat bg-cover bg-center py-8 px-4 sm:px-6 lg:px-8" style="background-image: url({{ asset('public/img/auth/login-bg.png') }});">
            @if (! file_exists(public_path('js/install.min.js')))
                <div class="relative w-full max-w-5xl flex flex-col lg:flex-row items-center justify-between bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="lg:w-1/2 flex flex-col items-center justify-center p-6">
                        <img src="{{ asset('public/img/empty_pages/transactions.png') }}" class="max-w-xs drop-shadow-md" alt="NuvisFinance Installation" />
                    </div>

                    <div class="w-full lg:w-1/2 flex flex-col justify-center gap-6 p-6">
                        <div class="flex flex-col items-start gap-4">
                            <img src="{{ asset('public/img/nuvisfinance-logo-green.svg') }}" class="h-10 my-1" alt="NuvisFinance" />
                            <h2 class="text-2xl font-bold text-gray-900">Installation Setup</h2>

                            <div class="w-full rounded-xl p-4 bg-red-50 border border-red-200 text-sm text-red-600 shadow-sm">
                                {!! trans('install.requirements.npm') !!}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="relative w-full max-w-6xl flex flex-col lg:flex-row items-stretch bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl border border-gray-100 overflow-hidden my-auto">
                    <x-layouts.auth.slider>
                        {!! $slider ?? '' !!}
                    </x-layouts.auth.slider>

                    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 lg:px-12 py-10 my-auto">
                        <div class="flex flex-col gap-6">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                                <img src="{{ asset('public/img/nuvisfinance-logo-green.svg') }}" class="h-9" alt="NuvisFinance" />
                                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-green-50 text-green-700 border border-green-200 shadow-xs">Installer</span>
                            </div>

                            <x-layouts.install.content :title="$title">
                                {!! $content !!}
                            </x-layouts.install.content>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @stack('body_end')

        <x-layouts.install.scripts />
    </body>
</html>
