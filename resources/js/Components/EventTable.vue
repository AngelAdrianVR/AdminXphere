<template>
<section class="relative">

<div class="w-full px-4">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded 
  bg-emerald-900 text-white">
    <div class="rounded-t mb-0 px-4 py-3 border-0 ">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-lg text-white">Historial de Eventos</h3>
        </div>
      </div>
    </div>
    <div class="block w-full overflow-x-auto ">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Nombre</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Fecha </th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Núm Invitados</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Notas</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Código</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Status</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700"></th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="event in events.data" :key="event.id">
            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
              <span class="ml-3 font-bold text-white text-lg"> {{ event.name }} </span></th>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ event.created_at }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ event.num_guests }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs p-4">{{ event.notes }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 uppercase">{{ event.code_event }}</td>
            <td v-if="event.is_active" class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><i class="fas fa-circle mr-2 text-green-600"></i>Activo</td>
            <td v-else class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><i class="fas fa-circle mr-2 text-red-600"></i>Expirado</td>
            <td class="flex border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
              <Link v-if="event.is_active" :href="route('guest-events.edit', event.id)" class="text-blueGray-500 block py-1 px-3 space-x-3">
                <i title="Editar" class="fa-solid fa-pencil hover:text-cyan-600"></i>
              </Link>
              <button v-if="event.is_active" @click="delete_confirm = true; item_to_delete = event.id;"  class="text-blueGray-500 block py-1 px-3 space-x-3">
                <i title="Borrar" class="fa fa-trash hover:text-red-600"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>

    <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar el registro de evento. Una vez realizado ya no se podrá
        recuperar.
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
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";

export default {
  data(){
    return{
      delete_confirm: false,
      item_to_delete: {},
    }
  },
  components: {
    Link,
    ConfirmationModal,
  },
  props:{
    events: Object,
  },
  methods:{
    delete() {
      this.$inertia.delete(
        this.route("guest-events.destroy", this.item_to_delete)
      );
      this.delete_confirm = false;
    },
  },
}
</script>