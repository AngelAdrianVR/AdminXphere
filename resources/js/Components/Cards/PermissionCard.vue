<template>
  <div
    class="rounded-lg cursor-pointer border-2 border-gray-200 hover:border-emerald-600 px-2 py-2 mb-3 transition ease-in-out bg-white"
  >
      <div class="flex items-center my-2">
        <Avatar :user="resident_permission.user" />
        <div class="flex flex-col">
          <small class="text-gray-500 -mt-1">{{ resident_permission.created_at }}</small>
        </div>
      </div>
          <p class="text-gray-700 -mt-1"> <strong> Tipo de permiso: </strong>{{ resident_permission.permission_type.name }}</p>
    <div class="bg-gray-200 border-2 shadow-md rounded-md px-2 py-1">
        <main>
          <div>
            <h1 class="font-bold text-lg text-gray-700">{{ resident_permission.subject }}</h1>
            <p class="text-sm text-gray-700 max-h-20 overflow-hidden">
              {{ resident_permission.description }}
            </p>
          </div>
        </main>
    </div>
    <footer class="flex justify-between items-center">
      <div class="flex flex-col space-x-3 text-gray-600 mt-2">
            <p class="text-sm text-gray-700 max-h-20 overflow-hidden mt-2">
              <strong>Fecha solicitada: </strong> {{ resident_permission.date }}
            </p>
            <p :class="resident_permission.status['color']">{{ resident_permission.status['text'] }}</p>
            <small v-if="resident_permission.replied_at" class="text-gray-400 mt-1">Respondido el {{ resident_permission.replied_at }}</small>
            <div class="flex p-4">
            <div class="text-center">
              <SecondaryButton @click="denegate_confirm = true" class="bg-red-700/100 hover:bg-red-600/100 shadow-red-800/100 mx-4"> Rechazar </SecondaryButton>
            </div>
            <div class="w-0 border border-gray-300"></div>
            <div class="text-center">
                <PrimaryButton @click="accept_confirm = true " class="mx-4">Autorizar</PrimaryButton>
            </div>
          </div>
      </div>
    </footer>
  </div>

  <!-- -----denegate confirmation modal------ -->
  <ConfirmationModal :show="denegate_confirm" @close="denegate_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de rechazar la solicitud de permiso.
      </div>
    </template>
    <template #footer>
      <div class="flex justify-end">
        <button @click="$inertia.put(route('general.permissions.denegated', resident_permission)); denegate_confirm = false" class="px-2 py-1 font-semibold border rounded border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition duration-200 mr-2">Rechazar permiso</button>
        <button class="px-2 py-1 font-semibold border rounded border-gray-500 text-gray-500 hover:bg-gray-100 transition duration-200" @click="denegate_confirm = false">
          Cancelar
        </button>
      </div>
    </template>
  </ConfirmationModal>
<!-- -----denegate confirmation modal------ -->

  <!-- -----accept confirmation modal------ -->
  <ConfirmationModal :show="accept_confirm" @close="accept_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de Autorizar la solicitud de permiso.
      </div>
    </template>
    <template #footer>
      <div class="flex justify-end">
        <button @click="$inertia.put(route('general.permissions.accepted', resident_permission)); accept_confirm = false" class="px-2 py-1 font-semibold border rounded border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition duration-200 mr-2">Autorizar permiso</button>
        <button class="px-2 py-1 font-semibold border rounded border-gray-500 text-gray-500 hover:bg-gray-100 transition duration-200" @click="denegate_confirm = false">
          Cancelar
        </button>
      </div>
    </template>
  </ConfirmationModal>
<!-- -----accept confirmation modal------ -->
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import Avatar from "@/Components/Avatar.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";

export default {
  data(){
    return{
      denegate_confirm: false,
      accept_confirm: false,
      modal: true,
    }
  },
  props: {
    resident_permission: Object,
  },
  components: {
    Link,
    Avatar,
    PrimaryButton,
    SecondaryButton,
    ConfirmationModal
  },
  methods:{

  }
};
</script>
