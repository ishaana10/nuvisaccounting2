<template>
    <div class="space-y-6">
        <InstallSteps :active_state="active"></InstallSteps>

        <div class="space-y-3 my-4">
            <div
                v-for="(requirement, index) in requirements"
                :key="index"
                class="flex items-start p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm shadow-xs transition duration-150"
            >
                <span class="material-icons-outlined text-red-500 mr-3 text-xl flex-shrink-0">error_outline</span>
                <span class="font-medium leading-relaxed">{{ requirement }}</span>
            </div>
        </div>

        <div class="flex items-center justify-end pt-4 border-t border-gray-100">
            <button
                type="button"
                @click="onRefresh"
                :disabled="button_loading"
                class="relative inline-flex items-center justify-center bg-green hover:bg-green-700 text-white font-medium px-6 py-2.5 text-sm rounded-xl transition duration-150 ease-in-out shadow-sm hover:shadow disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <i v-if="button_loading" class="animate-submit delay-[0.28s] absolute w-2 h-2 rounded-full left-0 right-0 -top-3.5 m-auto before:absolute before:w-2 before:h-2 before:rounded-full before:animate-submit before:delay-[0.14s] after:absolute after:w-2 after:h-2 after:rounded-full after:animate-submit before:-left-3.5 after:-right-3.5 after:delay-[0.42s]"></i>
                <span :class="[{'opacity-0': button_loading}]">
                    Refresh
                </span>
            </button>
        </div>
    </div>
</template>

<script>
    import InstallSteps from "./Steps.vue";

    export default {
        name: "requirements",

        components: {
            InstallSteps
        },

        data() {
            return {
                requirements: typeof flash_requirements !== 'undefined' ? flash_requirements : [],
                button_loading: false,
                active: 0
            };
        },

        methods: {
            onRefresh() {
                this.button_loading = true;
                window.location.reload();
            },
        },
    };
</script>
