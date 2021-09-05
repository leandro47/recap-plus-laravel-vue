<template>
  <nav class="sb-topnav navbar navbar-expand c-navbar">
    <!-- Navbar Brand-->
    <router-link class="navbar-brand ps-3 c-navbar-item" :to="{name: 'home'}">RecapPlus</router-link>
    <!-- Sidebar Toggle-->
    <button
      class="btn btn-link c-navbar-item btn-sm order-1 order-lg-0 me-4 me-lg-0"
      id="sidebarToggle"
      href="#!"
      @click.prevent="sidebarToggle"
    >
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar-->
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item dropdown">
        <a
          class="c-navbar-item dropdown-toggle"
          id="navbarDropdown"
          href="#"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
          ><i class="fas fa-user fa-fw"></i
        ></a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdown"
        >
          <li><a class="dropdown-item" href="#!" @click.prevent="logout"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "Navbar",
  computed: {
    ...mapGetters({
      error: "fetchUserError",
    }),
  },
  methods: {
    ...mapActions({
      logoutUser: "logoutUser",
    }),
    async logout() {
      await this.logoutUser();

      if (!this.error.length) {
        return this.$router.push({ name: "login" });
      }
    },
    sidebarToggle() {
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    },
  },
};
</script>

<style>
</style>