<template>
  <AppLayout title="Quejas y sugerencias">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       Quejas y Sugerencias
      </h2>
    </template>

    <div class="flex justify-start ml-2">
      <Link :href="route('general.index')" class="flex items-center mt-2 text-slate-700">
        <i class="fas fa-long-arrow-alt-left text-lg hover:bg-gray-200 rounded-full w-7 h-7 pl-1"></i>
        <span class="ml-1 cursor-default">Atrás</span>
      </Link>
    </div>

    <div class="mt-7 md:mx-7">
	    <SuggestionCard v-for="suggestion in suggestions.data" :key="suggestion.id" :suggestion="suggestion" />
    </div>


  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import SuggestionCard from "@/Components/Cards/SuggestionCard.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
  data() {
    const form = useForm({
      subject: "",
      description: "",
      resources: [],
    });
      
    return { form };
  },

  components: {
    AppLayout,
    Link,
    PrimaryButton,
    SuggestionCard
  },

  props: {
    suggestions: Array
  },

  methods: {
    store() {
      this.form.post(route("suggestions.store"));
  },
  },
};
</script>
