<template>
  <AppLayout title="Usuarios">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Usuarios
      </h2>
    </template>

    <div class="flex justify-end mb-3">
      <Link :href="route('users.create')">
        <SecondaryButton class="mr-7 mt-4">Crear nuevo</SecondaryButton>
      </Link>
    </div>

    <SearchInput :filters="filters" filterURL="/users" />

    <div class="max-w-3xl w-full mx-auto z-10">
      <div class="flex flex-col">
        <UserCard v-for="user in users.data" :key="user.id" :user="user" />
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import UserCard from "@/Components/Cards/UserCard.vue";
import { Link } from "@inertiajs/inertia-vue3";
import SearchInput from "@/Components/SearchInput.vue";
export default {
  data() {
    return {};
  },
  components: {
    AppLayout,
    SecondaryButton,
    Link,
    UserCard,
    SearchInput
  },
  props: {
    users: Object,
    filters: Object,
    filterURL: String,
  },
};
</script>
