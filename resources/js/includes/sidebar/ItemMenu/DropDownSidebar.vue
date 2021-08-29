<template>
  <div>
    <a
      class="nav-link collapsed"
      href="#"
      data-bs-toggle="collapse"
      data-bs-target="#collapseLayouts"
      aria-expanded="false"
      aria-controls="collapseLayouts"
    >
      <div class="sb-nav-link-icon"><i :class="icon"></i></div>
      {{ label }}
      <div class="sb-sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
      </div>
    </a>
    <div
      class="collapse"
      id="collapseLayouts"
      aria-labelledby="headingOne"
      data-bs-parent="#sidenavAccordion"
    >
      <nav class="sb-sidenav-menu-nested nav">
        <router-link
          v-for="item in items"
          :key="item.route"
          class="nav-link"
          :to="{name: item.route}"
          >{{item.label}}</router-link
        >
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  name: "DropDownSideBar",
  props: {
    label: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: true,
    },
    items: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style>
</style>