<x-layouts.install>
    <x-slot name="title">
        {{ trans('install.steps.database') }}
    </x-slot>

    <x-slot name="content">
        <div class="grid sm:grid-cols-6 gap-x-6 gap-y-5 my-2">
            <x-form.group.text name="hostname" label="{{ trans('install.database.hostname') }}" value="{{ old('hostname', $host) }}" form-group-class="sm:col-span-6" input-class="rounded-xl" />

            <x-form.group.text name="username" label="{{ trans('install.database.username') }}" value="{{ old('username', $username) }}" form-group-class="sm:col-span-6" input-class="rounded-xl" />

            <x-form.group.password name="password" label="{{ trans('install.database.password') }}" value="{{ $password }}" not-required form-group-class="sm:col-span-6" input-class="rounded-xl" />

            <x-form.group.text name="database" label="{{ trans('install.database.name') }}" value="{{ old('database', $database) }}" form-group-class="sm:col-span-6" input-class="rounded-xl" />
        </div>
    </x-slot>
</x-layouts.install>
