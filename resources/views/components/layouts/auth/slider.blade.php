@stack('slider_start')
<div class="hidden lg:block md:w-6/12 h-full flex-col h-fit">
    <div class="swiper bg-cover bg-bottom bg-no-repeat h-screen py-24">
        <div class="swiper-container h-full -mt-12">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-center flex-col items-center">
                    <div class="flex items-center justify-center p-4" style="max-width:450px;">
                        <img src="{{ asset('public/img/auth/nuvis_banner.jpg') }}" alt="{{ trans('auth.information.invoice') }}" class="rounded-lg shadow-md object-contain max-h-[450px]" />
                    </div>

                    <h1 class="text-3xl text-black-400 font-bold">
                        {{ trans('auth.information.invoice') }}
                    </h1>
                </div>

                <div class="swiper-slide flex justify-center flex-col items-center">
                    <div class="flex items-center justify-center p-4" style="max-width:450px;">
                        <img src="{{ asset('public/img/auth/nuvis_banner.jpg') }}" alt="{{ trans('auth.information.reports') }}" class="rounded-lg shadow-md object-contain max-h-[450px]" />
                    </div>

                    <h1 class="text-3xl text-black-400 font-bold">
                        {{ trans('auth.information.reports') }}
                    </h1>
                </div>

                <div class="swiper-slide flex justify-center flex-col items-center">
                    <div class="flex items-center justify-center p-4" style="max-width:450px;">
                        <img src="{{ asset('public/img/auth/nuvis_banner.jpg') }}" alt="{{ trans('auth.information.expense') }}" class="rounded-lg shadow-md object-contain max-h-[450px]" />
                    </div>

                    <h1 class="text-3xl text-black-400 font-bold">
                        {{ trans('auth.information.expense') }}
                    </h1>
                </div>

                <div class="swiper-slide flex justify-center flex-col items-center">
                    <div class="flex items-center justify-center p-4" style="max-width:450px;">
                        <img src="{{ asset('public/img/auth/nuvis_banner.jpg') }}" alt="{{ trans('general.dashboard') }}" class="rounded-lg shadow-md object-contain max-h-[450px]" />
                    </div>

                    <h1 class="text-3xl text-black-400 font-bold">
                        {{ trans('auth.information.customize') }}
                    </h1>
                </div>
            </div>

            <div class="swiper-pagination w-full flex justify-center pb-12 gap-1"></div>
        </div>
    </div>
</div>
@stack('slider_end')
