<template>
  <AppLayout title="Reportar Incidente">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Reportarrtes de Incidentes
      </h2>
    </template>

    <div class="flex justify-start ml-2">
      <Link :href="route('general.index')" class="flex items-center mt-2 text-slate-700">
        <i class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-200 rounded-full w-7 h-7 pl-1"></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
    </div>

    <div class="mt-7 md:mx-7">
	    <IncidentCard v-for="incident in incidents.data" :key="incident.id" :incident="incident" />
    </div>

    
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FileUploader from "@/Components/FileUploader.vue";
import FloatingInput from "@/Components/FloatingInput.vue";
import IncidentCard from "@/Components/Cards/IncidentCard.vue";
import PermissionCard from "@/Components/Cards/PermissionCard.vue";

export default {
  data() {
    const form = useForm({
        subject: "",
        description: "",
        resources: null,
     
      })
    return {form};
  },

  components: {
    AppLayout,
    Link,
    InputError,
    PrimaryButton,
    FileUploader,
    FloatingInput,
    IncidentCard,
    PermissionCard
  },

  props: {
    suggestions: Array
  },

  methods: {
    store(){
      this.form.post(route('incidents.store'));
    }
    
  },
};
</script>
