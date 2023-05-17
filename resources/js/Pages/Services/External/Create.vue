<template>
  <AppLayout title="Servicios Externos">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agregar Servicio Externo</h2>
    </template>

    <div class="flex justify-start ml-2">
      <Link
        :href="route('external-services.index')"
        class="flex items-center mt-2 text-slate-700"
      >
        <i
          class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-300 rounded-full w-7 h-7 pl-1"
        ></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
    </div>

    <div
      class="max-w-2xl md:mx-auto mt-5 shadow-md shadow-gray-500/70 rounded-lg px-5 py-8 bg-white mx-4"
    >
      <form @submit.prevent="store">
        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.name" type="text">
            <template #label> Nombre del Servicio/Tienda/Encargado* </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.name" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.phone" type="text">
            <template #label> Teléfono * </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.phone" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.whatsapp" type="text">
            <template #label> Whatsapp </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.whatsapp" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.website" type="text">
            <template #label> Sitio Web </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.website" class="mb-4" />
        </div>

        <label class="text-emerald-500"
          >Redes Sociales
        </label>

    <div class="border border-emerald-500/50 rounded-lg p-2">
        <div class="relative z-0 mb-6 mt-2 w-full group">
          <FloatingInput v-model="form.social_networks.facebook" type="text">
            <template #label>Facebook </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.social_networks" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.social_networks.instagram" type="text">
            <template #label>Instagram </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.social_networks" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.social_networks.tiktok" type="text">
            <template #label>Tiktok </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.social_networks" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.social_networks.twitter" type="text">
            <template #label>Twitter </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.social_networks" class="mb-4" />
        </div>
    </div>

        <div class="relative z-0 mb-6 mt-3 w-full group">
          <textarea
            v-model="form.description"
            type="text"
            rows="2"
            name="floating_notes"
            autocomplete="off"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-emerald-500 focus:outline-none focus:ring-0 focus:border-emerald-600 peer"
            placeholder=" "
          />
          <label
            for="floating_notes"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-emerald-600 peer-focus:dark:text-emerald-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
            >Descripción</label
          >
          <InputError :message="$page.props?.errors.description" />
        </div>

        <div class="block mb-7">
          <label class="flex items-center">
            <Checkbox v-model:checked="form.is_active" name="is_active" />
            <span class="ml-2 text-sm text-gray-500"> Está activo</span>
          </label>
        </div>

        <label class="text-gray-500"
          >Imagen de perfil</label
        >
        <div class="relative z-0 mb-6 w-full group">
          <FileUploader @input="form.resources = $event.target.files" />
        </div>

        <div class="flex justify-center lg:justify-end">
          <PrimaryButton :disabled="form.processing">Agregar</PrimaryButton>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import FloatingInput from "@/Components/FloatingInput.vue";
import FileUploader from "@/Components/FileUploader.vue";
import Checkbox from "@/Components/Checkbox.vue";

export default {
  data() {
    const form = useForm({
      name: "",
      phone: "",
      whatsapp: "",
      website: "",
      social_networks: {
        "facebook": null,
        "instagram": null,
        "tiktok": null,
        "twitter": null,
      },
      description: "",
      is_active: true,
    });
    return {
      form,
    };
  },

  components: {
    AppLayout,
    Link,
    PrimaryButton,
    InputError,
    FloatingInput,
    FileUploader,
    Checkbox
  },

  props: {},

  methods: {
    store() {
      this.form.post(this.route("external-services.store"));
    },
  },
  mounted() {},
};
</script>
