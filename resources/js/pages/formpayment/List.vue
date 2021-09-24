<template>
  <div class="mt-3">
    <HeadPage :title="'Pagamento'" :icon="'fas fa-money-check-alt'"></HeadPage>
    <Breadcrumb :links="[]" :active="'Pagamento'"></Breadcrumb>

    <div class="row">
      <div class="col-12">
        <div class="card shadow-none mb-4 rounded">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-md-2">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <router-link
                    v-if="isLoading"
                    class="btn c-btn c-btn-primary disabled mt-1 mb-1"
                    :to="{ name: 'add-formpayment' }"
                    role="button"
                  >
                    <span
                      class="spinner-grow spinner-grow-sm"
                      role="status"
                      aria-hidden="true"
                    ></span>
                  </router-link>
                  <router-link
                    title="Incluir"
                    v-else
                    class="btn c-btn c-btn-primary mt-1 mb-1"
                    :to="{ name: 'add-formpayment' }"
                    role="button"
                  >
                    <i class="fas fa-plus"></i>
                  </router-link>
                </div>
              </div>

              <div class="col-md-6 col-lg-3">
                <form @submit.prevent="searchData(1)">
                  <div class="input-group m-1">
                    <input
                      v-model="search"
                      type="text"
                      :disabled="isLoading"
                      placeholder="Pesquisar..."
                      class="form-control bg-light"
                    />
                    <div class="input-group-append">
                      <button
                        class="btn c-btn-primary"
                        title="Pesquisar"
                        type="submit"
                      >
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive" v-if="!isLoading">
              <table class="table table-sm table-hover">
                <thead class="c-table-thead">
                  <tr class="">
                    <th class="text-right fw-normal">Código</th>
                    <th class="fw-normal">Descrição</th>
                    <th class="fw-normal text-center">Ações</th>
                  </tr>
                </thead>
                <tbody v-for="formpayment in formpayments.data" :key="formpayment.id">
                  <tr class="fw-light">
                    <td>{{ formpayment.id }}</td>
                    <td>{{ formpayment.description }}</td>
                    <td class="text-center">
                      <div class="btn-group btn-group-sm">
                        <router-link
                          class="btn btn-sm text-warning"
                          :to="{
                            name: 'edit-formpayment',
                            query: { uuid: formpayment.uuid },
                          }"
                          title="Editar"
                        >
                          <i class="fa fa-edit"></i>
                        </router-link>
                        <a
                          @click.prevent="deleteFormPayment(formpayment.uuid)"
                          class="btn btn-sm text-danger"
                          title="Excluir"
                          ><i class="fa fa-trash"></i
                        ></a>
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
              :data="formpayments"
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
import Breadcrumb from "./../../components/breadcrumb/Breadcrumb";
import HeadPage from "./../../components/headpage/HeadPage";

export default {
  data() {
    return {
      isLoading: true,
      search: "",
    };
  },
  components: {
    Pagination,
    Breadcrumb,
    HeadPage,
  },
  computed: {
    ...mapGetters({
      errors: "getFormPaymentError",
      formpayments: "getFormPayments",
    }),
  },
  methods: {
    ...mapActions({
      destroyFormPayment: "destroyFormPayment",
    }),
    async deleteFormPayment(uuid) {
      this.$confirm("Deseja realmente deletar esse registro?", "Cuidado!").then(() => {
        this.destroyFormPayment(uuid);
      });
    },
    async searchData(param = 1) {
      this.isLoading = true;

      await this.$store.dispatch("fetchFormPayments", {
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