<template>
    <div class="space-y-6">
        <InstallSteps :active_state="active"></InstallSteps>

        <div>
            <div 
                class="w-full bg-red-50 text-red-600 border border-red-200 p-4 rounded-xl font-medium text-xs mb-4 shadow-xs"
                :class="(form.response.error) ? 'block' : 'hidden'"
                v-if="form.response.error"
                v-html="form.response.message"
            ></div>

            <form>
                <div class="grid sm:grid-cols-6 gap-x-6 gap-y-5">
                    <div class="sm:col-span-6 required" :class="[{'has-error': form.errors.get('hostname')}]">
                        <label for="hostname" class="block text-sm font-semibold text-gray-800 mb-1">
                            Hostname <span class="text-red-500">*</span>
                        </label>

                        <div class="input-group input-group-merge relative">
                            <input
                                class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                                :class="[{'border-red-400': form.errors.get('hostname')}, {'border-gray-200': !form.errors.get('hostname')}]"
                                data-name="hostname"
                                data-value="localhost"
                                @keydown="form.errors.clear('hostname')"
                                v-model="form.hostname"
                                required="required"
                                name="hostname"
                                type="text"
                                value="localhost"
                                id="hostname"
                            />
                        </div>

                        <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('hostname')" v-html="form.errors.get('hostname')"></div>
                    </div>

                    <div class="sm:col-span-6 required">
                        <label for="username" class="block text-sm font-semibold text-gray-800 mb-1">
                            Username <span class="text-red-500">*</span>
                        </label>

                        <div class="input-group input-group-merge">
                            <input 
                                :class="[{'border-red-400': form.errors.get('username')}, {'border-gray-200': !form.errors.get('username')}]"
                                class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                                data-name="username"
                                @keydown="form.errors.clear('username')"
                                v-model="form.username"
                                required="required"
                                name="username"
                                type="text"
                                id="username"
                            />
                        </div>

                        <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('username')" v-html="form.errors.get('username')"></div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="password" class="block text-sm font-semibold text-gray-800 mb-1">
                            Password
                        </label>

                        <div class="input-group input-group-merge">
                            <div class="relative">
                                <input 
                                    :class="[
                                        {
                                            'border-red-400': form.errors.get('password')
                                        },
                                        {
                                            'border-gray-200': !form.errors.get('password')
                                        },
                                        {
                                            'ltr:pr-10': form.password,
                                            'rtl:pl-10': form.password
                                        }
                                    ]"
                                    class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                                    data-name="password"
                                    v-model="form.password"
                                    name="password"
                                    value=""
                                    id="password"
                                    :type="showPassword ? 'text' : 'password'"
                                />

                                <button 
                                    type="button" 
                                    class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 text-gray-400 hover:text-gray-600"
                                    @click="showPassword = ! showPassword" v-show="form.password"
                                >
                                    <span v-show="! showPassword" class="material-icons-outlined text-gray-500 text-lg">visibility_off</span>
                                    <span v-show="showPassword" class="material-icons-outlined text-gray-500 text-lg">visibility</span>       
                                </button>
                            </div>
                        </div>

                        <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('password')" v-html="form.errors.get('password')"></div>
                    </div>

                    <div class="sm:col-span-6 required">
                        <label for="database" class="block text-sm font-semibold text-gray-800 mb-1">
                            Database <span class="text-red-500">*</span>
                        </label>

                        <div class="input-group input-group-merge">
                            <input 
                                :class="[{'border-red-400': form.errors.get('database')}, {'border-gray-200': !form.errors.get('database')}]"
                                class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                                data-name="database"
                                @keydown="form.errors.clear('database')"
                                v-model="form.database"
                                required="required"
                                name="database"
                                type="text"
                                id="database"
                            />
                        </div>

                        <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('database')" v-html="form.errors.get('database')"></div>
                    </div>
                </div>

                <div class="flex items-center justify-end pt-4 border-t border-gray-100 mt-6">
                    <button
                        type="submit"
                        @click="onSubmit($event)"
                        :disabled="form.loading"
                        id="next-button"
                        class="relative inline-flex items-center justify-center bg-green hover:bg-green-700 text-white font-medium px-6 py-2.5 text-sm rounded-xl transition duration-150 ease-in-out shadow-sm hover:shadow disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <i v-if="form.loading" class="animate-submit delay-[0.28s] absolute w-2 h-2 rounded-full left-0 right-0 -top-3.5 m-auto before:absolute before:w-2 before:h-2 before:rounded-full before:animate-submit before:delay-[0.14s] after:absolute after:w-2 after:h-2 after:rounded-full after:animate-submit before:-left-3.5 after:-right-3.5 after:delay-[0.42s]"></i>

                        <span :class="[{'opacity-0': form.loading}]">
                            Next
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Form from "./../../plugins/form";
    import InstallSteps from "./Steps.vue";

    export default {
        name: "database",

        components: {
            InstallSteps,
        },

        data() {
            return {
                form: new Form("form-install"),
                active: 1,
                showPassword: false,
            };
        },

        methods: {
            // Form Submit
            onSubmit(event) {
                event.preventDefault();
                this.form.submit();
            },

            next() {
                if (this.active++ > 2);
            },
        },
    };
</script>
