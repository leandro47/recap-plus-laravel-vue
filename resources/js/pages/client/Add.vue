<template>
  <div class="mt-3">
    <HeadPage :title="'Incluir'" :icon="'fas fa-address-card'"></HeadPage>
    <Breadcrumb
      :links="[{ name: 'Clientes', route: 'list-client' }]"
      :active="'Incluir'"
    ></Breadcrumb>

    <div class="row">
      <div class="col-12">
        <div class="card shadow-none mb-4 rounded">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-md-2">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a
                    href="#!"
                    title="Salvar"
                    class="btn c-btn btn-success mt-1 mb-1"
                    ><i class="fas fa-save"></i
                  ></a>
                  <a
                    href="#!"
                    title="Cancelar"
                    class="btn c-btn btn-danger mt-1 mb-1"
                    ><i class="fas fa-window-close"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="row g-3">
              <div class="col-12">
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="type"
                    id="type1"
                    v-model="form.type"
                    value="f"
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
                    value="j"
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
                  class="form-control"
                  id="cpf_cnpj"
                  placeholder="Cpf ou cnpj"
                  v-model.trim="form.cpf_cnpj"
                />
              </div>

              <div class="col-md-3">
                <label for="state" class="form-label">Estado</label>
                <v-select v-model="form.state" @change="$emit('option:selected', selectedOption)" :options="states"></v-select>
              </div>

              <div class="col-md-2">
                <label for="city_id" class="form-label">Cidade</label>
                <v-select v-model="form.city" :options="states"></v-select>
              </div>

              <div class="col-md-2">
                <label for="cep" class="form-label">Cep</label>
                <input
                  type="text"
                  class="form-control"
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
                  type="text"
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
                  class="form-control"
                  v-model.trim="form.phone"
                  id="phone"
                />
              </div>

              <div class="col-md-3">
                <label for="cell_phone" class="form-label">Celular</label>
                <input
                  type="phone"
                  class="form-control"
                  v-model.trim="form.cell_phone"
                  id="cell_phone"
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
import "vue-select/dist/vue-select.css";

export default {
  data() {
    return {
      form: {},
    };
  },
  components: {
    Breadcrumb,
    HeadPage,
    vSelect,
  },
  computed: {
    ...mapGetters({
      states: "fetchStates"
    }),
  },
  methods: {
    ...mapActions({
      fetchStates : "fetchStates"
    }),
    selectedOption() {
      console.log('updated')
    }
  },
  created() {
    this.fetchStates();
  },
};
</script>

<style>
</style>