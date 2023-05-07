<template>
  <AppLayout title="Documentos">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Subir documento</h2>
    </template>

    <AlertInfo>
      <template #title> ATENCIÓN </template>
      <template #info>
        Si desea subir más de un archivo, favor de seleccionarlos todos in a row.
      </template>
    </AlertInfo>

    <div class="flex justify-start ml-2">
      <Link
        :href="route('general.documents')"
        class="flex items-center mt-2 text-slate-700"
      >
        <i
          class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-200 rounded-full w-7 h-7 pl-1"
        ></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
    </div>

    <div
      class="max-w-2xl md:mx-auto mt-5 shadow-md shadow-gray-500/70 rounded-lg px-5 py-8 bg-white mx-4"
    >
      <form @submit.prevent="store">
        <div class="relative z-0 mb-6 w-full group">
          <FileUploader @input="form.resources = $event.target.files" />
        </div>

        <div class="flex justify-center lg:justify-end">
          <PrimaryButton>Subir</PrimaryButton>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AlertInfo from "@/Components/AlertInfo.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FloatingInput from "@/Components/FloatingInput.vue";
import InputError from "@/Components/InputError.vue";
import FileUploader from "@/Components/FileUploader.vue";

export default {
  data() {
    const form = useForm({
      
    });

    return { form };
  },

  components: {
    AppLayout,
    Link,
    AlertInfo,
    PrimaryButton,
    FloatingInput,
    InputError,
    FileUploader
  },

  props: {
  },

  methods: {
    store() {
      this.form.post(route("resident-permissions.store"));
    },
  },
};
</script>
