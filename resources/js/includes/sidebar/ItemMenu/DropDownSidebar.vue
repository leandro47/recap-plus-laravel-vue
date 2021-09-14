<template>
  <div>
    <a
      class="nav-link c-sidebar-item collapsed"
      href="#"
      data-bs-toggle="collapse"
      :data-bs-target="`#${target}`"
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
      :id="target"
      aria-labelledby="headingOne"
      data-bs-parent="#sidenavAccordion"
    >
      <nav class="sb-sidenav-menu-nested c-sidebar-item nav">
        <router-link
          v-for="item in items"
          :key="item.route"
          class="nav-link"
          :to="{ name: item.route }"
          >{{ item.label }}</router-link
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
    target: {
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