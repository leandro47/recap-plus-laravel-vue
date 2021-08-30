<template>
  <div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
    </div>
    <div class="row justify-content-between">
      <div class="col-md-2 mb-3">
        <a class="btn btn-primary btn-block" href="#" role="button"
          >Adicionar</a
        >
      </div>

      <div class="col-md-6 col-lg-3 mb-3">
        <form @submit.prevent="">
          <div class="input-group">
            <input
              type="text"
              placeholder="Filtrar"
              class="form-control bg-light"
            />
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <table class="table table-striped table-hover">
          <thead class="">
            <tr>
              <th class="text-right">Código</th>
              <th>Nome</th>
              <th>CPF/CNPJ</th>
              <th>tipo</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  computed: {
    ...mapGetters({
      errors: "fetchClientError",
      list: "listClient"
    }),
  },
  methods: {
    ...mapActions({
      fetchClient: "fetchClient",
    })
  },
  async created() {
    await this.fetchClient()
    console.log(this.list)
  },
};
</script>

<style>
</style>