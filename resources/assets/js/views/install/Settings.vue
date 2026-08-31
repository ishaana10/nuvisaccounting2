<template>
    <div class="space-y-6">
        <InstallSteps :active_state="active"></InstallSteps>

        <form>
            <div class="grid sm:grid-cols-6 gap-x-6 gap-y-5">
                <div class="sm:col-span-6 required">
                    <label for="company_name" class="block text-sm font-semibold text-gray-800 mb-1">
                        Company Name <span class="text-red-500">*</span>
                    </label>

                    <div class="input-group input-group-merge">
                        <input
                            :class="[{'border-red-400': form.errors.get('company_name')}, {'border-gray-200': !form.errors.get('company_name')}]"
                            class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                            data-name="company_name"
                            @keydown="form.errors.clear('company_name')"
                            v-model="form.company_name"
                            required="required"
                            name="company_name"
                            type="text"
                            id="company_name"
                        />
                    </div>
                    <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('company_name')" v-html="form.errors.get('company_name')"></div>
                </div>

                <div class="sm:col-span-6 required">
                    <label for="company_email" class="block text-sm font-semibold text-gray-800 mb-1">
                        Company Email <span class="text-red-500">*</span>
                    </label>

                    <div class="input-group input-group-merge">
                        <input
                            :class="[{'border-red-400': form.errors.get('company_email')}, {'border-gray-200': !form.errors.get('company_email')}]"
                            class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                            data-name="company_email"
                            @keydown="form.errors.clear('company_email')"
                            v-model="form.company_email"
                            required="required"
                            name="company_email"
                            type="email"
                            id="company_email"
                        />
                    </div>
                    <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('company_email')" v-html="form.errors.get('company_email')"></div>
                </div>

                <div class="sm:col-span-6 required">
                    <label for="user_email" class="block text-sm font-semibold text-gray-800 mb-1">
                        Admin Email <span class="text-red-500">*</span>
                    </label>

                    <div class="input-group input-group-merge">
                        <input
                            :class="[{'border-red-400': form.errors.get('user_email')}, {'border-gray-200': !form.errors.get('user_email')}]"
                            class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                            data-name="user_email"
                            @keydown="form.errors.clear('user_email')"
                            v-model="form.user_email"
                            required="required"
                            name="user_email"
                            type="email"
                            id="user_email"
                        />
                    </div>
                    <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('user_email')" v-html="form.errors.get('user_email')"></div>
                </div>

                <div class="sm:col-span-6 required">
                    <label for="user_password" class="block text-sm font-semibold text-gray-800 mb-1">
                        Admin Password <span class="text-red-500">*</span>
                    </label>

                    <div class="input-group input-group-merge">
                        <div class="relative">
                            <input
                                :class="[
                                    {
                                        'border-red-400': form.errors.get('user_password')
                                    },
                                    {
                                        'border-gray-200': !form.errors.get('user_password')
                                    },
                                    {
                                        'ltr:pr-10': form.user_password,
                                        'rtl:pl-10': form.user_password
                                    }
                                ]"
                                class="w-full text-sm px-4 py-2.5 rounded-xl border text-gray-900 placeholder-gray-400 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green transition duration-150 shadow-xs"
                                data-name="user_password"
                                @keydown="form.errors.clear('user_password')"
                                v-model="form.user_password"
                                required="required"
                                name="user_password"
                                value=""
                                id="user_password"
                                :type="showPassword ? 'text' : 'password'"
                            />

                            <button 
                                type="button" 
                                class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 text-gray-400 hover:text-gray-600"
                                @click="showPassword = ! showPassword" v-show="form.user_password"
                            >
                                <span v-show="! showPassword" class="material-icons-outlined text-gray-500 text-lg">visibility_off</span>
                                <span v-show="showPassword" class="material-icons-outlined text-gray-500 text-lg">visibility</span>       
                            </button>
                        </div>
                    </div>
                    <div class="text-red-500 text-xs mt-1 font-medium block" v-if="form.errors.has('user_password')" v-html="form.errors.get('user_password')"></div>
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
</template>

<script>
    import Form from "./../../plugins/form";
    import InstallSteps from "./Steps.vue";

    export default {
        name: "settings",

        components: {
            InstallSteps,
        },

        data() {
            return {
                form: new Form("form-install"),
                languages: [],
                active: 2,
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
