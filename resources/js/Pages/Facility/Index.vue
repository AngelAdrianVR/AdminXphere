<template>
  <AppLayout title="Reservación de Areas">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Reservación de Áreas
      </h2>
    </template>

    <div class="flex justify-end">
      <Link :href="route('facilities.create')">
        <SecondaryButton class="mr-7 mt-4 mb-1">Agregar Área</SecondaryButton
        >
      </Link>
    </div>

    <div class="py-6">
      <div class="max-w-7xl mx-auto lg:px-8">
        <div class="lg:grid grid-cols-3 gap-4">
          <h1 class="col-span-full text-cyan-700 font-bold text-2xl my-4 ml-4">Áreas comunes para reservar</h1>
         <FacilityCard2 v-for="facility in facilities.data" :key="facility.id" :facility="facility" class="mb-2" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
<script>

import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import FacilityCard2 from "@/Components/Cards/FacilityCard2.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

export default {
  data() {
    
    return {  };
  },

  components: {
    AppLayout,
    Link,
    FacilityCard2,
    SecondaryButton,
  },

  props: {
    facilities: Object,
    my_next_reservations: Array,
  },

  methods: {
    
  },
};
</script>
