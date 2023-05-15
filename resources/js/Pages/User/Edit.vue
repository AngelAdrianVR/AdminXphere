<template>
  <AppLayout title="Crear Usuario">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Usuario "{{ user.name }}"</h2>
    </template>

    <div class="flex justify-between ml-2">
      <Link
        :href="route('users.index')"
        class="flex items-center mt-2 text-slate-700"
      >
        <i
          class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-300 rounded-full w-7 h-7 pl-1"
        ></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
    <SecondaryButton class="mr-7 mt-2" :disabled="form.processing">Resetear contraseña</SecondaryButton>
    </div>

    <div
      class="max-w-2xl md:mx-auto mt-5 shadow-md shadow-gray-500/70 rounded-lg px-5 py-8 bg-white mx-4"
    >
      <form @submit.prevent="update">
        <div class="relative z-0 mb-6 w-full group">
          <FloatingInput v-model="form.name" type="text">
            <template #label> Calle y Número * </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.name" class="mb-4" />
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
            <span class="ml-2 text-sm text-gray-500"> Usuario Activo</span>
          </label>
        </div>

            <!-- Componente para subir archivos por si es requerido -->

        <!-- <div class="relative z-0 mb-6 w-full group">
          <FileUploader @input="form.resources = $event.target.files" />
        </div> -->

        <div class="flex justify-center lg:justify-end">
          <PrimaryButton :disabled="form.processing">Actualizar</PrimaryButton>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputError from "@/Components/InputError.vue";
import FloatingInput from "@/Components/FloatingInput.vue";
import FileUploader from "@/Components/FileUploader.vue";
import Checkbox from "@/Components/Checkbox.vue";

export default {
  data() {
    const form = useForm({
      name: this.user.name,
      phone: this.user.phone,
      is_active: this.user.is_active,
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
    Checkbox,
    SecondaryButton
  },

  props: {
    user: Object
  },

  methods: {
    update() {
      this.form.put(this.route("users.update"), this.user);
    },
  },
  mounted() {},
};
</script>
