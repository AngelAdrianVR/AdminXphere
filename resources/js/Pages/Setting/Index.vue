<template>
  <AppLayout title="Configuraciones">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Configuraciones
      </h2>
    </template>

    <SuscriptionCard />

  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  data() {
    
    return {  };
  },

  components: {
    AppLayout,
    Link,
  },

  props: {

  },

  methods: {
    
  },
};
</script>
