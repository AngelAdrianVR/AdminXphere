<template>
<section class="relative">

<div class="w-full px-4">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded 
  bg-emerald-900 text-white">
    <div class="rounded-t mb-0 px-4 py-3 border-0 ">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-lg text-white">Bitácora de Visitas</h3>
        </div>
      </div>
    </div>
    <div class="block w-full overflow-x-auto ">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Residente</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Visita</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Tipo</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Notas</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Marca/modelo Vehiculo</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Placas</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Status</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Fecha </th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700">Hr llegada </th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-emerald-800 text-emerald-300 border-emerald-700"></th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="guest in guests.data" :key="guest.id">
            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
              <span class="ml-3 font-bold text-white text-lg"> {{ guest.user.name }} </span></th>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ guest.name }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ guest.guest_type.name }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ guest.notes }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ guest.brand_car }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ guest.plate_car }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              <i class="fas fa-circle mr-2" :class="guest.status['color']"></i>{{ guest.status['text'] }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              <div>
                <span>{{guest.created_at}}</span>
              </div>
            </td>
            <td class="border-t-0  align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              <div class="flex items-center justify-center">
                <span class="">{{ guest.arrived_time }}</span>
              </div>
            </td>
            <td class="flex border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
              <button v-if="guest.status['text'] == 'Pendiente'" @click="entry_confirm = true; item_to_entry = guest;"  class="text-blueGray-500 block py-1 px-3 space-x-3">
                <i title="Ingresado" class="fa-solid fa-circle-check text-xl hover:text-green-400"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>

    <ConfirmationModal :show="entry_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Marcarcarás como Ingresado al visitante.
      </div>
    </template>
    <template #footer>
      <div class="flex justify-end">
        <button @click="this.entry()" class="px-2 py-1 font-semibold border rounded border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition duration-200 mr-2">Marcar como Ingresado</button>
        <button class="px-2 py-1 font-semibold border rounded border-gray-500 text-gray-500 hover:bg-gray-100 transition duration-200" @click="entry_confirm = false">
          Cancelar
        </button>
      </div>
    </template>
  </ConfirmationModal>
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";

export default {
  data(){
    return{
      entry_confirm: false,
      item_to_entry: {},
    }
  },
  components: {
    Link,
    ConfirmationModal,
  },
  props:{
    guests: Object,
  },
  methods:{
    entry() {
      this.$inertia.put(
        this.route("guest.entry-guest", this.item_to_entry)
      );
      this.entry_confirm = false;
    },
  },
}
</script>