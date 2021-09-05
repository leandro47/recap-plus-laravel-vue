<template>
  <div class="mt-3">
    <Breadcrumb
      :links="[
        {
          name: 'Clientes',
          route: 'list-client',
          class: 'active',
        }
      ]"
    ></Breadcrumb>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar</h1>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Breadcrumb from "./../../components/breadcrumb/Breadcrumb";

export default {
  components: {
    Breadcrumb,
  },
  computed: {
    ...mapGetters({
      client: "getClient",
    }),
  },
  created() {
    this.edit(this.$route.query.uuid);
  },
  methods: {
    ...mapActions({
      fetchClient: "fetchClient",
    }),
    async edit(uuid) {
      await this.fetchClient(uuid);
      console.log(this.client);
    },
  },
};
</script>

<style>
</style>