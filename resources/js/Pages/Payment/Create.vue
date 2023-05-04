<template>
  <AppLayout title="Crear ficha de pago">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear ficha de pago</h2>
    </template>

    <div class="flex justify-start ml-2">
      <Link :href="route('payments.history')" class="flex items-center mt-2 text-slate-700">
        <i
          class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-200 rounded-full w-7 h-7 pl-1"
        ></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
    </div>


    <div
      class="max-w-2xl md:mx-auto mt-5 shadow-md shadow-gray-500/70 rounded-lg px-5 py-8 bg-gray-50 mx-4"
    >
      <form @submit.prevent="store">

        <div class="mb-5">
          <FloatingInput v-model="form.concept" type="text">
          <template #label>
              Concepto *
          </template>
         </FloatingInput>
         <InputError :message="$page.props?.errors.concept" />
        </div>

        <div class="mb-5">
          <FloatingInput v-model="form.description" type="text">
           <template #label>
               Descripción
           </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.description" />
        </div>

        <div class="mb-5">
          <FloatingInput v-model="form.amount" type="text">
           <template #label>
               Monto *
           </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.amount" />
        </div>

        <div class="mb-5">
          <FloatingInput v-model="form.expired_date" type="date">
           <template #label>
               Fecha de expiración
           </template>
          </FloatingInput>
          <InputError :message="$page.props?.errors.expired_date" />
        </div>

        <div class="block mb-7">
          <label class="flex items-center">
            <Checkbox v-model:checked="form.all_users" name="all_users" />
            <span class="ml-2 text-sm text-gray-500"> Para todos los usuarios</span>
          </label>
        </div>

    <!-- User selector starts -->
        <div :show="!all_users">
        <label  class="block mt-3 w-full text-sm text-gray-500">Usuarios a los que va dirigida la ficha</label>
          <div class="">
            <select class="
            bg-gray-200
            mb-3
            mr-2
            rounded-lg
            border border-gray-300
            text-gray-500
            focus:border-stone-500 focus:text-stone-500
          " v-model="selected_user">
              <option disabled selected class="text-gray-500" value="">
                -- Seleccionar usuario --
              </option>
              <option v-for="user in users" :key="user.name" class="text-gray-500" :value="user.name">
                {{ user.name }}
              </option>
            </select>

            <SecondaryButton @click="addUser" class="mb-4">Agregar usuario</SecondaryButton>
            <div>
              <span v-for="(item,index) in form.users_selected" :key="item" class="bg-sky-100 px-1 py-px rounded-md mr-3 text-xs">
                {{ item }} <button type="button" @click="deleteUser(index)">x</button>
              </span>
            </div>
          </div>
          <label for="floating_work_days" class="
              absolute
              text-sm text-gray-500
              dark:text-gray-700
              duration-300
              transform
              -translate-y-6
              scale-75
              top-3
              -z-10
              origin-[0]
              peer-focus:left-0
              peer-focus:text-stone-600
              peer-focus:dark:text-stone-500
              peer-placeholder-shown:scale-100
              peer-placeholder-shown:translate-y-0
              peer-focus:scale-75 peer-focus:-translate-y-6
            ">Días de trabajo*</label>
          <InputError :message="$page.props?.errors.employee_properties?.work_days" />
          </div>
<!-- User selector ends -->

        <div class="flex justify-center lg:justify-end">
          <PrimaryButton :disabled="form.processing">Crear</PrimaryButton>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";
import FloatingInput from '@/Components/FloatingInput.vue'

export default {
  data() {
    const form = useForm({
      concept: "",
      description: "",
      expired_date: "",
      amount: "",
      users_selected: [],
      all_users: false,
      selected_user: null,
    });
    return { form };
  },

  components: {
    AppLayout,
    Link,
    PrimaryButton,
    Checkbox,
    InputError,
    FloatingInput,
    SecondaryButton,
  },

  props: {
    users: Array,
  },

  methods: {
    store() {
      this.form.post(route("payment.store"));
    },
    addUser() {
      this.form.users_selected.push(this.selected_user);
    },
    deleteUser(index) {
      this.form.users_selected.splice(index);
    },
  },
};
</script>
