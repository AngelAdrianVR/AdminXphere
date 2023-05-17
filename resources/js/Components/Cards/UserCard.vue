<template>
      <div
        class="bg-white border border-white shadow-lg rounded-2xl p-2 mx-3 my-1 hover:bg-slate-200"
      >
        <Link :href="route('users.edit', user)">
          <div class="flex">
            <div class="relative h-16 w-16 mr-2">
              <i
                class="fa-solid fa-circle-user text-6xl"
                :class="user.is_active ? 'text-green-500' : 'text-red-500'"
              ></i>
            </div>
            <section class="flex flex-col flex-1">
              <div class="flex justify-between">
                <h1 class="text-xs font-bold">ID: {{ user.id }} | {{ user.name }}</h1>
                <span
                  v-if="user.is_active"
                  class="bg-green-100 text-green-700 text-xs px-2 py-px rounded-lg"
                  >Activo</span
                >
                <span v-else class="bg-red-100 text-red-700 text-xs px-2 py-px rounded-lg"
                  >Inactivo</span
                >
              </div>
              <p class="text-xs text-gray-500">
                Vehículos:
                <ul>
                  <li v-for="vehicle in user.vehicles" :key="vehicle.brand"> * {{ vehicle.brand }} - {{ vehicle.model }}</li>
                </ul> 
              </p>
              <p class="text-xs text-gray-500">
                <i class="fa-solid fa-mobile-screen-button mr-1"></i>
                {{ user.phone }}
              </p>
              <p class="text-xs text-gray-500">
                <i class="fa-regular fa-envelope mr-1"></i>
                {{ user.email }}
              </p>
            </section>
          </div>
        </Link>
        <div @click="delete_confirm = true" class="bg-red-500 rounded-xl w-10 py-2 flex items-center justify-center hover:bg-red-600 cursor-pointer ml-auto">
          <i class="fa-solid fa-trash text-white"></i>
        </div>
      </div>

      <!-- -----confirmation modal------ -->
  <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar al usuario <strong> {{ user.name }} </strong>.
      </div>
    </template>
    <template #footer>
      <div class="flex justify-end">
        <button @click="this.delete()" class="px-2 py-1 font-semibold border rounded border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition duration-200 mr-2">Eliminar</button>
        <button class="px-2 py-1 font-semibold border rounded border-gray-500 text-gray-500 hover:bg-gray-100 transition duration-200" @click="delete_confirm = false">
          Cancelar
        </button>
      </div>
    </template>
  </ConfirmationModal>
<!-- -----confirmation modal------ -->
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";

export default {
  data() {
    return {
      delete_confirm: false,
    };
  },
  props: {
    user: Object,
  },
  components: {
    Link,
    ConfirmationModal
  },
  methods:{
    delete(){
      this.$inertia.delete(route('users.destroy', this.user));
      this. delete_confirm = false;
    }
  }
};
</script>
