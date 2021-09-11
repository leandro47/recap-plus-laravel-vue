<template>
  <div class="mt-3">
    <HeadPage :title="'Editar'" :icon="'fas fa-address-card'"></HeadPage>
    <Breadcrumb
      :links="[{ name: 'Clientes', route: 'list-client' }]"
      :active="'Editar'"
    ></Breadcrumb>

    <div class="row">
      <div class="col-12">
        <div class="card shadow-none mb-4 rounded">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-md-2">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a
                    @click="formAction()"
                    title="Salvar"
                    class="btn c-btn btn-success mt-1 mb-1"
                    ><i class="fas fa-save"></i
                  ></a>
                  <router-link
                    :to="{ name: 'list-client' }"
                    title="Cancelar"
                    class="btn c-btn btn-danger mt-1 mb-1"
                    ><i class="fas fa-window-close"></i
                  ></router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="row g-3">
              <div class="col-12" v-if="this.clientError.data">
                <div
                  class="alert alert-danger d-flex align-items-center"
                  role="alert"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                    viewBox="0 0 16 16"
                    role="img"
                    aria-label="Warning:"
                  >
                    <path
                      d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                    />
                  </svg>
                  <div>
                    <strong>Ops!</strong> <br />
                    {{ this.clientError.data }}
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="type"
                    id="type1"
                    v-model="form.type"
                    value="F"
                  />
                  <label class="form-check-label" for="type1"
                    >Pessoa fisica</label
                  >
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="type"
                    id="type2"
                    v-model="form.type"
                    value="J"
                    checked
                  />
                  <label class="form-check-label" for="type2"
                    >Pessoa juridica</label
                  >
                </div>
              </div>
              <div class="col-md-5">
                <label for="name" class="form-label">Nome</label>
                <input
                  type="text"
                  v-model.trim="form.name"
                  class="form-control"
                  id="name"
                />
              </div>

              <div class="col-md-4">
                <label for="cpf_cnpj" class="form-label">Documento</label>
                <input
                  type="text"
                  class="form-control cpfcnpj"
                  id="cpf_cnpj"
                  placeholder="Cpf ou cnpj"
                  v-model.trim="form.cpf_cnpj"
                />
              </div>

              <div class="col-md-3">
                <label for="state" class="form-label">Estado</label>
                <v-select
                  v-model="form.state"
                  @input="updateCities"
                  :options="states"
                ></v-select>
              </div>

              <div class="col-md-2">
                <label for="city_id" class="form-label">Cidade</label>
                <v-select v-model="form.city"  @input="clearErrors" :options="cities"></v-select>
              </div>

              <div class="col-md-2">
                <label for="cep" class="form-label">Cep</label>
                <input
                  type="text"
                  class="form-control cep"
                  id="cep"
                  v-model.trim="form.cep"
                />
              </div>

              <div class="col-md-2">
                <label for="district" class="form-label">Bairro</label>
                <input
                  type="text"
                  class="form-control"
                  id="district"
                  v-model.trim="form.district"
                />
              </div>

              <div class="col-md-5">
                <label for="street" class="form-label">Rua</label>
                <input
                  type="text"
                  class="form-control"
                  v-model.trim="form.street"
                  id="street"
                />
              </div>

              <div class="col-md-1">
                <label for="number" class="form-label">Numero</label>
                <input
                  type="number"
                  class="form-control"
                  v-model.trim="form.number"
                  id="number"
                />
              </div>

              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  v-model.trim="form.email"
                  id="email"
                />
              </div>

              <div class="col-md-3">
                <label for="phone" class="form-label">Telefone</label>
                <input
                  type="phone"
                  class="form-control phone"
                  v-model.trim="form.phone"
                  id="phone"
                />
              </div>

              <div class="col-md-3">
                <label for="cell_phone" class="form-label">Celular</label>
                <input
                  type="phone"
                  class="form-control cell-phone"
                  v-model.trim="form.cell_phone"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Breadcrumb from "./../../components/breadcrumb/Breadcrumb";
import HeadPage from "./../../components/headpage/HeadPage";
import vSelect from "vue-select";
import MaskMixin from "./../../mixins/MaskMixin";
import "vue-select/dist/vue-select.css";

export default {
  data() {
    return {
      form: {

      },
    };
  },
  components: {
    Breadcrumb,
    HeadPage,
    vSelect,
  },
  computed: {
    ...mapGetters({
      states: "fetchStates",
      cities: "fetchCities",
      clientError: "getClientError",
      client: "getClient",
      city: "fetchCity",
    }),
  },
  mixins: [MaskMixin],
  methods: {
    ...mapActions({
      fetchStates: "fetchStates",
      fetchCities: "fetchCities",
      storeClient: "storeClient",
      clearErrors: "clearErrors",
      fetchClient: "fetchClient",
      fetchCity: "fetchCity",
    }),
    async updateCities() {
      this.form.city = null;
      if (this.form.state != null) {
        await this.fetchCities(this.form.state.id);
      } else {
        await this.fetchCities(-1);
      }
    },
    async setCity() {
      this.form.city = this.form.city;
    },
    async editclient(uuid) {
      await this.fetchClient(uuid);
      await this.fetchCity(this.client.city_id);
      this.form = this.client;
      this.form.state = this.city.state;
      this.updateCities()
      this.form.city = this.city.city;
    },
    async formAction() {
      await this.storeClient(this.form);
      if (!this.clientError.data) {
        return this.$router.push({ name: "list-client" });
      }
    },
  },
  mounted: function () {
    this.importMask();
  },
  created() {
    this.clearErrors();
    this.fetchStates();
    this.editclient(this.$route.query.uuid);
  },
};
</script>

<style>
</style>