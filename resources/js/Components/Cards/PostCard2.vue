<template>

<div class="flex bg-white shadow-lg rounded-lg md:mx-auto max-w-md md:max-w-2xl cursor-pointer border-2 border-gray-200 hover:border-emerald-600 px-2 py-2 mb-3 transition ease-in-out"><!--horizantil margin is just for display-->
<Link :href="route('neighborhood.show', post.id)">
   <div class="flex items-start px-14 py-6 -ml-9">
      <img class="w-14 h-14 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
      <div class="w-64 -mx-4 py-3 px-1">
         <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">{{ post.user.name }}</h2>
            <small class="text-sm text-gray-700">{{ post.created_at }}</small>
         </div>
         <p class="text-gray-700">{{ post.title }} </p>
         <p class="mt-3 text-gray-700 text-sm truncate">
            {{ post.content }}
         </p>
         <div class="mt-4 flex items-center">
            <div class="flex mr-2 text-gray-700 text-sm ">
               <i class="fa-regular fa-image rounded-full"></i>
               <span>{{ post.media.length }}</span>
            </div>
            <div class="flex mr-2 text-gray-700 text-sm ">
               <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
               </svg>
               <span>{{ post.comments.length }}</span>
            </div>
            <div class="flex mr-2 text-gray-700 text-sm ">
               <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
               <span>share</span>
            </div>
         </div>
      </div>
   </div>
   </Link>
</div>        
    
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: {
    post: Object,
  },
  components: {
    Link,
  },
};
</script>