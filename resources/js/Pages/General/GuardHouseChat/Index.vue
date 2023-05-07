<template>
  <AppLayout title="Chat con Caseta">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Chat con Caseta
      </h2>
    </template>

    <div class="flex justify-start ml-2">
      <Link :href="route('general.index')" class="flex items-center mt-2 text-slate-700">
        <i class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-200 rounded-full w-7 h-7 pl-1"></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
    </div>

    <div class="grid grid-cols-4 gap-x-3 mt-2 h-[calc(100%-0.5rem)]">
      <div class="col-span-3 ml-4">
        <Avatar :user="$page.props.user" />
        <div class="w-full h-2/3 bg-white border border-gray-300 rounded-lg"></div>
        <form
          class="
            flex
            items-center
            mt-2
          "
        >
          <textarea class="flex-1 mr-3 h-20 rounded-lg text-gray-600 border border-gray-400 focus:ring-emerald-500" placeholder="Escribe tu mensaje aquí..."></textarea>
          <PrimaryButton type="submit" class="btn-primary">
            <i class="fa-solid fa-paper-plane"></i>
          </PrimaryButton>
        </form>
      </div>
      <div class="flex flex-col space-y-2 mt-12 px-3">
        <div class="p-1" :class="user_selected ? 'bg-blue-200 border-l-4 border-emerald-400' : 'cursor-pointer hover:bg-emerald-100'"><Avatar :user="$page.props.user" secondary_info="Gerente de ventas" /></div>
        <div><Avatar :user="$page.props.user" secondary_info="Director general" /></div>
        <div><Avatar :user="$page.props.user" secondary_info="Asistente de dirección" /></div>
      </div>
    </div>

  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Avatar from "@/Components/Avatar.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
  data() {
    
    return {  };
  },

  components: {
    AppLayout,
    Link,
    Avatar,
    PrimaryButton
  },

  props: {
  },

  methods: {
    
  },
};
</script>
