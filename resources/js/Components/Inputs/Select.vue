<template>
  <div class="relative inline-block">
    <select
      v-model="selected"
      class="
        block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline
        transition duration-300 ease-in-out transform
        focus:translate-x-1 focus:scale-105
        active:translate-x-2 active:scale-100
      "
    >
      <option
        v-for="(option, index) in options"
        :key="index"
        :value="option.value"
      >
        {{ option.text }}
      </option>
    </select>
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
      <svg
        class="w-4 h-4 fill-current"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 12l-5-5 1.41-1.41L10 9.17l3.59-3.58L15 7l-5 5z"
        />
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SelectComponent',
  data() {
    return {
      selected: '',
    //   options: [],
    };
  },
  props:{
    options: Array,
  }
};
</script>

<style scoped>

/* Estilos para las opciones */
.select select option {
  padding: 10px;
  background-color: #dbd9d9;
  color: #008b62;
  transition: background-color 0.2s ease;
  border-radius: 10px;
}

.select select option:hover,
.select select option:focus {
  background-color: #cbccce;
  color: #008b62;
  border-radius: 10px;
}


</style>
