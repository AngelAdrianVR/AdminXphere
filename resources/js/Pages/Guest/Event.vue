<template>
  <AppLayout title="Eventos">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Eventos</h2>
    </template>

    <div class="my-4 border-b border-gray-300">
      <Tabs :tabs="tabs" />
    </div>

    <SearchInput :filters="filters" filterURL="/guest-events" />
    <EventTable :events="events" />
    <div class="flex justify-end">
      <Pagination :pagination="events" />
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import EventTable from "@/Components/EventTable.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Pagination from "@/Components/Pagination.vue";
import SearchInput from "@/Components/SearchInput.vue";
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
    EventTable,
    Link,
    SecondaryButton,
    Pagination,
    SearchInput,
    Tabs,
  },

  props: {
    events: Object,
    filters: Object,
    filterURL: String,
  },

  methods: {},
};
</script>