<template>
  <div
    class="
      border-2 border-transparent
      hover:border-emerald-600
      mb-3
      transition
      ease-in-out
      bg-transparet
      rounded-md
    "
  >
        <div class="bg-white shadow-md rounded-md px-2 py-3 border border-gray-400">
          <main class="grid grid-cols-3">
            <div class="col-span-2">
              <h1 class="font-bold text-lg text-gray-700">{{ incident.subject }}</h1>
              <p class="text-sm text-gray-400 max-h-20 overflow-hidden">{{ incident.created_at }}</p>
              <p class="text-sm text-gray-600 max-h-20 overflow-hidden uppercase">{{ incident.description }}</p>
              <p v-if="incident.is_solved" class="text-sm text-green-600 max-h-20 overflow-hidden ">Resuelto el:{{ incident.updated_at }}</p>
            </div>
            <div class="flex justify-center items-center">
              <Link :href="route('general.report-incident.solved', incident)">
                <PrimaryButton v-if="!incident.is_solved" class="text-sm text-white bg-green-600 mx-6"><i class="fa-solid fa-check text-green-500 mr-1"></i>Resuelto</PrimaryButton>
              </Link>  
            </div>
          </main>
        </div>
  </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
  props: {
    incident: Object,
  },
  components: {
    Link,
    PrimaryButton
  },
};
</script>
