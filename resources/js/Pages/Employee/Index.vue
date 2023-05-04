<template>
  <AppLayout title="Empleados">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Empleados
      </h2>
    </template>

    <div class="flex justify-end mb-3">
      <Link :href="route('users.create')">
        <SecondaryButton class="mr-7 mt-4">Agregar nuevo</SecondaryButton>
      </Link>
    </div>

    <div class="max-w-3xl w-full mx-auto z-10">
      <div class="flex flex-col">
        <EmployeeCard v-for="user in users" :key="user.id" :user="user" />
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import EmployeeCard from "@/Components/Cards/EmployeeCard.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  data() {
    return {};
  },
  components: {
    AppLayout,
    SecondaryButton,
    Link,
    EmployeeCard,
  },
  props: {
    users: Object,
  },
};
</script>
