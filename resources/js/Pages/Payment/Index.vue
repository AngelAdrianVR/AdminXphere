<template>
  <AppLayout title="Pagos pendientes">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">PAGOS</h2>
    </template>

    <div class="my-4 border-b border-gray-300">
      <Tabs :tabs="tabs" />
    </div>

       <div class="flex justify-end">
      <Link :href="route('payments.create')">
        <SecondaryButton class="mr-7 mt-4 mb-1">Generar ficha de pago</SecondaryButton
        >
      </Link>
    </div>

    <div>
      <PaymentTable :payments="payments" />
    </div>
    <div class="flex justify-end">
      <Pagination :pagination="payments" />
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PaymentTable from "@/Components/PaymentTable.vue";
import Tabs from "@/Components/Tabs.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
  data() {
    return {
      tabs: [
        {
          label: "Historial",
          url: "payments.history",
        },
        {
          label: "Pendientes",
          url: "payments.index",
        },
      ],
    };
  },

  components: {
    AppLayout,
    Link,
    PrimaryButton,
    SecondaryButton,
    PaymentTable,
    Tabs,
    Pagination
  },

  props: {
    payments: Object,
  },

  methods: {},
};
</script>
