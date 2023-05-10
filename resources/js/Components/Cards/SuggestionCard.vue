<template>
  <div
    class="
      border-2 border-transparent
      hover:border-emerald-600
      mb-3
      transition
      ease-in-out
      bg-transparet
      rounded-md
    "
  >
        <div class="bg-white shadow-md rounded-md px-2 py-3 border border-gray-400">
          <main class="grid grid-cols-3">
            <div class="col-span-3">
              <h1 class="font-bold text-lg text-gray-700">{{ suggestion.subject }}</h1>
              <p class="text-sm text-gray-400 max-h-20 overflow-hidden">{{ suggestion.created_at }}</p>
              <p class="text-sm text-gray-600 max-h-20 overflow-hidden uppercase">{{ suggestion.description }}</p>
              <PrimaryButton @click="delete_confirm = true" class="mt-2 bg-red-700/100 hover:bg-red-600/100 shadow-red-800/100"><i class="fa-solid fa-trash text-white mr-1"></i>Eliminar</PrimaryButton>
            </div>
          </main>
        </div>
  </div>

  <!-- -----confirmation modal------ -->
  <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar la queja o sugerencia.
      </div>
    </template>
    <template #footer>
      <div class="flex justify-end">
        <button @click="$inertia.delete(route('suggestions.destroy', suggestion)); delete_confirm = false" class="px-2 py-1 font-semibold border rounded border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition duration-200 mr-2">Eliminar</button>
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
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";

export default {
  data(){
    return{
      delete_confirm: false,
    }
  },
  props: {
    suggestion: Object,
  },
  components: {
    Link,
    PrimaryButton,
    ConfirmationModal
  },
};
</script>
