<template>
  <AppLayout title="Visitas">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Visitas</h2>
    </template>

  <div class="my-4 border-b border-gray-300">
      <Tabs :tabs="tabs" />
    </div>

    <SearchInput class="mt-9" :filters="filters" filterURL="/guest" />
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
import Tabs from "@/Components/Tabs.vue";

export default {
  data() {
    return {
     tabs: [
        {
          label: "Bitácora",
          url: "guest.index",
        },
        {
          label: "Eventos",
          url: "guest.event",
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
    Tabs
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