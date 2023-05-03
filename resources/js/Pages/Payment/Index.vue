<template>
  <AppLayout title="Pagos Pendientes">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">PAGOS</h2>
    </template>

    <div class="my-4 border-b border-gray-300">
      <Tabs :tabs="tabs" />
    </div>

    <div>
      <PaymentCard v-for="payment in payments.data" :key="payment.id" :payment="payment" />
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PaymentCard from "@/Components/Cards/PaymentCard.vue";
import Tabs from "@/Components/Tabs.vue";

export default {
  data() {
    return {
      tabs: [
        {
          label: "Pendientes",
          url: "payments.index",
        },
        {
          label: "Historial",
          url: "payments.history",
        },
      ],
    };
  },

  components: {
    AppLayout,
    Link,
    PrimaryButton,
    SecondaryButton,
    Tabs,
    PaymentCard,
  },

  props: {
    payments: Object,
  },

  methods: {},
};
</script>
