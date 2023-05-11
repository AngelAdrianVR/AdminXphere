<template>
  <AppLayout title="Crear Usuario">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agregar Usuario</h2>
    </template>

    <div class="flex justify-start ml-2">
      <Link
        :href="route('users.index')"
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
            <template #label> Calle y Número * </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.name" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.email" type="text">
            <template #label> Email * </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.email" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.password" type="number">
            <template #label> Contraseña * </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.password" class="mb-4" />
        </div>

        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.phone" type="number">
            <template #label> Teléfono * </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.phone" class="mb-4" />
        </div>

        <div class="block mb-7">
          <label class="flex items-center">
            <Checkbox v-model:checked="form.is_active" name="is_active" />
            <span class="ml-2 text-sm text-gray-500"> Está activa</span>
          </label>
        </div>

            <!-- Componente para subir archivos por si es requerido -->

        <!-- <div class="relative z-0 mb-6 w-full group">
          <FileUploader @input="form.resources = $event.target.files" />
        </div> -->

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
      email: "",
      password: null,
      phone: null,
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
      this.form.post(this.route("users.store"));
    },
  },
  mounted() {},
};
</script>
