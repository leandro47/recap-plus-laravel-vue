<template>
  <div>
    <div v-if="user.email">
      <Navbar></Navbar>
      <div id="layoutSidenav">
        <Sidebar></Sidebar>
        <div id="layoutSidenav_content">
          <main>
            <div class="container-fluid px-4">
              <router-view></router-view>
            </div>
          </main>
          <Footer></Footer>
        </div>
      </div>
    </div>
    <div v-else>
      <div id="layoutAuthentication">
        <router-view></router-view>
        <div id="layoutAuthentication_footer">
          <Footer></Footer>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Footer from "./../includes/footer/Footer";
import Navbar from "./../includes/navbar/Navbar";
import Sidebar from "./../includes/sidebar/Sidebar";
import { mapGetters, mapActions } from "vuex";

export default {
  computed: {
    ...mapGetters({
      user: "fetchUser",
    }),
  },
  components: {
    Footer,
    Navbar,
    Sidebar,
  },
  methods: {
    ...mapActions({
      fetchUser: "fetchUser",
    }),
    async showMenu() {
      await this.fetchUser();
    },
  },
  created() {
    this.showMenu();
  },
};
</script>

<style>
</style>