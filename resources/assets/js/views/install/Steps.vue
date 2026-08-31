<template>
  <div class="mb-8">
      <nav aria-label="Progress">
          <ol role="list" class="flex items-center justify-between relative w-full">
              <!-- Connecting Progress Line -->
              <div class="absolute top-4 left-0 w-full h-0.5 bg-gray-200 z-0">
                  <div
                      class="h-full bg-green transition-all duration-300 ease-in-out"
                      :style="{ width: progressWidth }"
                  ></div>
              </div>

              <!-- Step 1: Language -->
              <li class="relative z-10 flex flex-col items-center group">
                  <div
                      class="w-9 h-9 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-200 shadow-sm"
                      :class="[
                          active_state > 0
                              ? 'bg-green text-white ring-4 ring-green-100'
                              : active_state == 0
                              ? 'bg-green text-white ring-4 ring-green-100'
                              : 'bg-white border-2 border-gray-300 text-gray-500'
                      ]"
                  >
                      <span v-if="active_state > 0" class="material-icons-outlined text-base">check</span>
                      <span v-else>1</span>
                  </div>
                  <span
                      class="text-xs font-medium mt-2 transition-colors duration-200"
                      :class="[
                          active_state >= 0 ? 'text-gray-900 font-semibold' : 'text-gray-500'
                      ]"
                  >
                      Language
                  </span>
              </li>

              <!-- Step 2: Database -->
              <li class="relative z-10 flex flex-col items-center group">
                  <div
                      class="w-9 h-9 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-200 shadow-sm"
                      :class="[
                          active_state > 1
                              ? 'bg-green text-white ring-4 ring-green-100'
                              : active_state == 1
                              ? 'bg-green text-white ring-4 ring-green-100'
                              : 'bg-white border-2 border-gray-300 text-gray-500'
                      ]"
                  >
                      <span v-if="active_state > 1" class="material-icons-outlined text-base">check</span>
                      <span v-else>2</span>
                  </div>
                  <span
                      class="text-xs font-medium mt-2 transition-colors duration-200"
                      :class="[
                          active_state >= 1 ? 'text-gray-900 font-semibold' : 'text-gray-500'
                      ]"
                  >
                      Database
                  </span>
              </li>

              <!-- Step 3: Admin -->
              <li class="relative z-10 flex flex-col items-center group">
                  <div
                      class="w-9 h-9 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-200 shadow-sm"
                      :class="[
                          active_state > 2
                              ? 'bg-green text-white ring-4 ring-green-100'
                              : active_state == 2
                              ? 'bg-green text-white ring-4 ring-green-100'
                              : 'bg-white border-2 border-gray-300 text-gray-500'
                      ]"
                  >
                      <span v-if="active_state > 2" class="material-icons-outlined text-base">check</span>
                      <span v-else>3</span>
                  </div>
                  <span
                      class="text-xs font-medium mt-2 transition-colors duration-200"
                      :class="[
                          active_state >= 2 ? 'text-gray-900 font-semibold' : 'text-gray-500'
                      ]"
                  >
                      Admin
                  </span>
              </li>
          </ol>
      </nav>
  </div>
</template>

<script>
  export default {
        name: "Steps",

        props: {
            active_state: {
                type: [Boolean, String, Number],
                default: 0
            }
        },

        computed: {
            progressWidth() {
                const state = Number(this.active_state);
                if (state <= 0) return '0%';
                if (state === 1) return '50%';
                return '100%';
            }
        }
    };
</script>
