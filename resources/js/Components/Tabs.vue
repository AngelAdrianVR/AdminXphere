<template>
  <div class="flex justify-center items-center border-b-2 font-bold w-full overflow-x-auto">
    <Link v-for="(tab, key) in tabs" :key="key" :href="route(tab.url)"
      :class="route().current(tab.url) ? 'border-emerald-500 text-emerald-500 border-b-2' : ''" class="px-7 py-1"
      v-html="tab.label" />
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  props: {
    tabs: Array,
  },
};
</script>
