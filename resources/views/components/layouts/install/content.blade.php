@stack('content_start')
<div id="app">
    @stack('content_content_start')
    <x-form id="form-install" :url="url()->current()">

        <div class="card-body p-0">
            @if(!empty($attributes->get('title')))
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-900 tracking-tight">
                    {!! $attributes->get('title') !!}
                </h3>
            </div>
            @endif

            @include('flash::message')

            {!! $slot !!}
        </div>

        <div class="card-footer mt-8 pt-4 border-t border-gray-100 flex justify-end">
            <div>
                @if (Request::is('install/requirements'))
                    <x-link href="{{ route('install.requirements') }}" class="inline-flex items-center justify-center bg-green hover:bg-green-700 text-white font-medium px-6 py-2.5 text-sm rounded-xl transition duration-150 ease-in-out shadow-sm hover:shadow" override="class">
                        {{ trans('install.refresh') }}
                    </x-link>
                @else
                    <x-button
                        type="submit"
                        id="next-button"
                        ::disabled="loading"
                        class="relative inline-flex items-center justify-center bg-green hover:bg-green-700 text-white font-medium px-6 py-2.5 text-sm rounded-xl transition duration-150 ease-in-out shadow-sm hover:shadow disabled:opacity-50 disabled:cursor-not-allowed sm:col-span-6"
                        override="class"
                        data-loading-text="{{ trans('general.loading') }}"
                    >
                        <i v-if="loading" class="submit-spin absolute w-2 h-2 rounded-full left-0 right-0 -top-3.5 m-auto"></i> 
                        <span :class="[{'opacity-0': loading}]">
                            {{ trans('install.next') }}
                        </span>
                    </x-button>
                @endif
            </div>
        </div>
    </x-form>
    @stack('content_content_end')

    <notifications></notifications>

    <form id="form-dynamic-component" method="POST" action="#"></form>

    <component v-bind:is="component"></component>
</div>
@stack('content_end')
