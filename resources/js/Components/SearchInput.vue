<template>

	<div class="flex flex-1 justify-center my-2">
		<div class="md:w-1/2">
			<div class="input-group relative flex items-stretch w-full mb-4">

				<input type="search" @keyup.enter="search" v-model="search_text" placeholder="Buscar..."
					class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-500 bg-white bg-clip-padding border-2 border-solid border-emerald-600 rounded-tl-md rounded-bl-md transition ease-in-out m-0 focus:text-gray-900 focus:bg-gray-200 focus:border-emerald-600 focus:outline-none"
					aria-label="Search" aria-describedby="button-addon2">
				<button @click="search"
					class="btn px-6 py-2.5 bg-emerald-600 text-white font-medium text-xs leading-tight uppercase rounded-tr-md rounded-br-md shadow-md hover:bg-emerald-700 hover:shadow-lg focus:bg-emerald-800  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-emerald-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
					type="button" id="button-addon2">

					<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4"
						role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
						<path fill="currentColor"
							d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
						</path>
					</svg>
				</button>
			</div>
		</div>
		<span v-if="has_submited" @click="clearSearch" class="text-sm text-emerald-400 hover:text-emerald-600 cursor-pointer ml-6 mt-4">Ver todo</span>
	</div>

</template>

<script>
import pickBy from "lodash/pickBy";

export default {
	data() {
		return {
			has_submited: false,
			search_text: this.filters.search,
		}
	},
	components: {
	},
	methods: {
		search() {
			if (this.search_text)
				this.has_submited = true;
			else
				this.has_submited = false;

			this.$inertia.get(this.filterURL, pickBy({ search: this.search_text }), { preserveState: true });
		},
		clearSearch() {
			this.search_text = "";
			this.search();
		},
	},
	props: {
		filters: {
			type: Object,
			default: {
				search: null
			}
		},
		filterURL: String
	}
}
</script>