<template>
  <div
    class="mt-20 rounded-lg cursor-pointer border-2 border-transparent hover:border-emerald-600 transition ease-in-out bg-transparet"
  >
    <div class="bg-gray-200 shadow-md rounded-md px-2 py-3">
      <!-- component -->
      <div
        class="bg-gray-200 font-sans w-full flex flex-row justify-center items-center"
      >
        <div class="card w-80 mx-auto bg-white shadow-xl hover:shadow">
          <img :class="internal_service ? 'border-green-500' : 'border-red-500' "
            class="w-32 mx-auto rounded-full -mt-20 border-2"
            src="https://avatars.githubusercontent.com/u/67946056?v=4"
            alt=""
          />
          <div class="text-center mt-2 text-3xl font-medium">{{internal_service.name}}</div>
          <div class="text-center font-normal text-sm flex flex-col">
          <p><i class="fa-solid fa-phone text-gray-600"></i> {{internal_service.phone}}</p> 
          <p v-if="internal_service.whatsapp"><i class="fa-brands fa-whatsapp ml-1 text-green-600"></i> {{internal_service.whatsapp}}</p> 
          </div>
          <div class="bg-gray-300 mx-2 pb-1 rounded-lg text-gray-700 py-1 my-1">
            <div class="px-6 text-center mt-2 font-light text-sm">
              <p>{{internal_service.description}}</p>
            </div>
          </div>
          <hr class="mt-8" />
          <div class="flex p-4">
            <div class="w-1/2 text-center">
              <SecondaryButton>{{internal_service.is_active ? 'Desactivar' : 'Activar'}}</SecondaryButton>
            </div>
            <div class="w-0 border border-gray-300"></div>
            <div class="w-1/2 text-center">
            <Link :href="route('internal-services.edit', internal_service)">
              <PrimaryButton>Editar</PrimaryButton>
              </Link>
            </div>
          </div>

          <div class="flex p-4">
            <div class="w-full text-center">
                <PrimaryButton @click="delete_confirm=true" class="bg-red-700/100 hover:bg-red-600/100 shadow-red-800/100">Eliminar</PrimaryButton>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- -----confirmation modal------ -->
  <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar el registro de servicio interno.
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
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";


export default {
  data(){
    return {
      delete_confirm: false,
    }
  },
  props: {
    internal_service: Object,
  },
  components: {
    Link,
    PrimaryButton,
    SecondaryButton,
    ConfirmationModal
  },
  methods:{
    delete() {
      this.$inertia.delete(
        this.route("internal-services.destroy", this.internal_service)
      );
      this.entry_confirm = false;
    },
  },
};
</script>
