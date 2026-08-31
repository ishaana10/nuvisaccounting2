<x-layouts.install>
    <x-slot name="title">
        {{ trans('install.steps.language') }}
    </x-slot>

    <x-slot name="content">
        <div class="space-y-4">
            <label for="lang" class="block text-sm font-semibold text-gray-800">
                Select Language
            </label>
            <div class="relative">
                <select name="lang" id="lang" size="12" class="w-full rounded-xl border border-gray-200 p-2 text-sm text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green shadow-xs transition duration-150 overflow-y-auto">
                    @foreach ($lang_allowed as $code => $name)
                    <option value="{{ $code }}" @if ($code == $locale) {{ 'selected="selected"' }} @endif class="p-2.5 rounded-lg hover:bg-gray-100 cursor-pointer text-sm my-0.5">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-slot>
</x-layouts.install>
