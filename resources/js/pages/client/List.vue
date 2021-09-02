<template>
  <div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
    </div>

    <div class="row justify-content-between">
      <div class="col-md-2 mb-3">
        <router-link
          v-if="isLoading"
          class="btn btn-primary btn-block disabled"
          :to="{ name: 'add-client' }"
          role="button"
        >
          <span
            class="spinner-grow spinner-grow-sm"
            role="status"
            aria-hidden="true"
          ></span>
          Carregando...
        </router-link>
        <router-link
          v-else
          class="btn btn-primary btn-block"
          :to="{ name: 'add-client' }"
          role="button"
        >
          <i class="fas fa-plus"></i> Adicionar
        </router-link>
      </div>

      <div class="col-md-6 col-lg-3 mb-3">
        <form @submit.prevent="searchData(1)">
          <div class="input-group">
            <input
              v-model="search"
              type="text"
              :disabled="isLoading"
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
        <div class="card shadow-sm p-3 mb-5 rounded">
          <div class="card-body">
            <div class="table-responsive table-sm-mb-2" v-if="!isLoading">
              <table class="table table-striped table-hover">
                <thead class="">
                  <tr>
                    <th class="text-right">Código</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody v-for="client in clients.data" :key="client.id">
                  <tr>
                    <td>{{ client.id }}</td>
                    <td>{{ client.name }}</td>
                    <td>{{ client.cpf_cnpj }}</td>
                    <td>{{ client.phone }}</td>
                    <td>{{ client.email }}</td>
                    <td class="text-center" style="width: 15%">
                      <div class="btn-group btn-group-sm">
                      <router-link
                        class="btn btn-warning"
                        :to="{
                          name: 'edit-client',
                          params: { uuid: client.uuid },
                        }"
                      >
                        <i class="fa fa-edit"></i> Editar
                      </router-link>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="text-center" v-else>
              <div
                class="spinner-grow"
                style="width: 3rem; height: 3rem"
                role="status"
              >
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <pagination
              v-show="!isLoading"
              :data="clients"
              @pagination-change-page="searchData"
              :align="'right'"
              :limit="-1"
            >
            </pagination>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Pagination from "laravel-vue-pagination";

export default {
  data() {
    return {
      isLoading: true,
      search: "",
    };
  },
  components: {
    Pagination,
  },
  computed: {
    ...mapGetters({
      errors: "getClientError",
      clients: "getClients",
    }),
  },
  methods: {
    ...mapActions({}),
    async searchData(param = 1) {
      this.isLoading = true;

      await this.$store.dispatch("fetchClients", {
        page:
          param.current_page && this.search.trim() ? param.current_page : param,
        search: this.search,
      });

      this.isLoading = false;
    },
  },
  created() {
    this.searchData();
  },
};
</script>

<style>
</style>