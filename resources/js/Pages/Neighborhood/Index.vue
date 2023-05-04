<template>
  <AppLayout title="Sección vecinal">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Sección vecinal
      </h2>
    </template>

    <div class="flex justify-end">
      <Link :href="route('neighborhood.create')">
        <SecondaryButton class="mr-7 mt-4 mb-1">Crear Aviso</SecondaryButton
        >
      </Link>
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto lg:px-8">
        <div class="lg:grid grid-cols-3 gap-4">
          <PostCard v-for="post in posts.data" :key="post.id" :post="post" />
        </div>
      </div>
    </div>



    <div class="py-12">
      <div class="max-w-7xl mx-auto lg:px-8">
        <div class="lg:grid grid-cols-3 gap-4">
          <PostCard2 v-for="post in posts.data" :key="post.id" :post="post" />
        </div>
      </div>
    </div>


  </AppLayout>
</template>
<script>

import AppLayout from "@/Layouts/AppLayout.vue";
import PostCard from "@/Components/Cards/PostCard.vue";
import PostCard2 from "@/Components/Cards/PostCard2.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    AppLayout,
    PostCard,
    PostCard2,
    SecondaryButton,
    Link,
  },
  props: {
    posts: Object,
  },
};
</script>
