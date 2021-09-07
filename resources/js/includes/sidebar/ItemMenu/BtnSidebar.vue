<template>
  <div>
    <router-link class="nav-link c-sidebar-item" :to="{name: route}">
      <div class="sb-nav-link-icon">
        <i :class="icon"></i>
      </div>
      {{label}}
    </router-link>
  </div>
</template>

<script>
export default {
  name: "BtnSideBar",
  props: {
    label: {
      type: String,
      required: true,
    },
    route: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: true,
    },
  },
};
</script>

<style>
</style>