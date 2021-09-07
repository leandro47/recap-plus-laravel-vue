<template>
  <nav aria-label="breadcrumb" >
    <ol class="breadcrumb shadow-none p-3 c-breadcrumb rounded">
    <router-link class="breadcrumb-item active" :to="{name: 'home'}">Home</router-link>
      <router-link
        v-for="link in links"
        :key="link.name"
        class="breadcrumb-item active"
        :to="{name: link.route}"
      >
      {{link.name}}
      </router-link>
      <span class="breadcrumb-item text-muted">{{active}}</span>
    </ol>
  </nav>
</template>

<script>
export default {
  name: "Breadcrumb",
  props: {
    links: {
      type: Array,
      required: true,
    },
    active: {
      type: String,
      required: true
    }
  },
};
</script>

<style>
</style>