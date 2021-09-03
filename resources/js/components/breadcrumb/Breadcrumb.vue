<template>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <router-link class="breadcrumb-item" :to="{name: 'home'}">Home</router-link>
      <router-link
        v-for="link in links"
        :key="link.route"
        :class="`breadcrumb-item ${link.class}`"
        :to="{name: link.route}"
      >
      {{link.name}}
      </router-link>
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
  },
};
</script>

<style>
</style>