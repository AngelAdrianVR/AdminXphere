<template>
  <AppLayout title="Documentos Generales">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Documentos del Fraccionamiento
      </h2>
    </template>

    <div class="flex justify-between ml-2">
      <Link :href="route('general.index')" class="flex items-center mt-2 text-slate-700">
        <i class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-200 rounded-full w-7 h-7 pl-1"></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
      <div>
      <Link :href="route('general.documents.create')">
        <SecondaryButton class="mr-7 mt-4 mb-1">Subir Documento</SecondaryButton
        >
      </Link>
    </div>
    </div>

    

  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";

export default {
  data() {
    
    return {  };
  },

  components: {
    AppLayout,
    Link,
    SecondaryButton,
  },

  props: {
  },

  methods: {
    
  },
};
</script>
