<template>
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Acesso rápido</div>

          <BtnSideBar
            :label="'Home'"
            :route="'home'"
            :icon="'fas fa-home'"
          ></BtnSideBar>

          <BtnSideBar
            :label="'Dashboard'"
            :route="'dashboard'"
            :icon="'fas fa-tachometer-alt'"
          ></BtnSideBar>

          <div class="sb-sidenav-menu-heading">Cadastro</div>

          <DropDownSideBar
            :label="'Clientes'"
            :icon="'fas fa-address-card'"
            :target="'item1'"
            :items="[
              { label: 'Incluir', route: 'add-client' },
              { label: 'Listar', route: 'list-client' },
            ]"
          ></DropDownSideBar>

          <DropDownSideBar
            :label="'Pagamento'"
            :icon="'fas fa-money-check-alt'"
            :target="'item2'"
            :items="[
              { label: 'Incluir', route: 'add-formpayment' },
              { label: 'Listar', route: 'list-formpayment' },
            ]"
          ></DropDownSideBar>

        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Logado como:</div>
        {{ user.name }}
      </div>
    </nav>
  </div>
</template>

<script>
import BtnSideBar from "./ItemMenu/BtnSidebar";
import DropDownSideBar from "./ItemMenu/DropDownSidebar";
import { mapGetters, mapActions } from "vuex";

export default {
  name: "Sidebar",
  components: {
    BtnSideBar,
    DropDownSideBar,
  },
  computed: {
    ...mapGetters({
      user: "fetchUser",
    }),
  },
};
</script>

<style>
</style>