<template>
  <AppLayout title="Visitas">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Visitas</h2>
    </template>

    <div class="flex justify-end mt-3 mr-3">
      <select class="rounded-lg border border-gray-400 text-gray-500 focus:border-stone-500 focus:text-stone-500" name="users" id="users">
        <option selected>-- Selecciona un usuario --</option>
        <option v-for="user in users" :key="user.id"> {{ user.name }} </option>
      </select>
    </div>

    <SearchInput :filters="filters" filterURL="/guest" />
    <GuestsTable :guests="guests" />
    <div class="flex justify-end">
      <Pagination :pagination="guests" />
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import GuestsTable from "@/Components/GuestsTable.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Pagination from "@/Components/Pagination.vue";
import SearchInput from "@/Components/SearchInput.vue";
import Select from "@/Components/Inputs/Select.vue";

export default {
  data() {
    return {
      user:[
        {
          'name' : 'angel',
          'phone': '123456789',
        },
        {
          'name' : 'miguel',
          'phone': '123456789',
        },
        {
          'name' : 'chuy',
          'phone': '123456789',
        },
      ],
    };
  },

  components: {
    AppLayout,
    GuestsTable,
    Link,
    SecondaryButton,
    Pagination,
    SearchInput,
    Select,
  },

  props: {
    users: Object,
    guests: Object,
    filters: Object,
    filterURL: String,
  },

  methods: {},
};
</script>