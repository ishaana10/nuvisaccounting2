<template>
    <div class="space-y-6">
        <InstallSteps :active_state="active"></InstallSteps>

        <div>
            <form>
                <div class="mb-6">
                    <label for="lang" class="block text-sm font-semibold text-gray-800 mb-2">
                        Select Language
                    </label>
                    <div class="relative">
                        <select
                            v-model="form.lang"
                            name="lang"
                            id="lang"
                            size="12"
                            class="w-full rounded-xl border border-gray-200 p-2 text-sm text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-green/20 focus:border-green shadow-xs transition duration-150 overflow-y-auto"
                        >
                            <option
                                v-for="(name, code) in languages"
                                :key="code"
                                :value="code"
                                class="p-2.5 rounded-lg hover:bg-gray-100 cursor-pointer text-sm my-0.5"
                            >
                                {{ name }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end pt-4 border-t border-gray-100">
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
    import axios from "axios";
    import Form from "./../../plugins/form";
    import InstallSteps from "./Steps.vue";

    var base_path = typeof url !== 'undefined' ? url.replace(window.location.origin, "") : "";

    export default {
        name: "language",

        components: {
            InstallSteps,
        },

        mounted() {
            axios
                .get(base_path + "/install/language/getLanguages")
                .then((response) => {
                    this.languages = response.data.languages;
                    this.form.lang = "en-GB";
                })
                .catch((error) => {});
        },

        data() {
            return {
                form: new Form("form-install"),
                languages: [],
                active: 0,
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

<style scoped>
 select {
     background-image: none;
 }
</style>
