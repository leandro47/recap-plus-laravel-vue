<template>
  <div class="mt-3">
    <HeadPage :title="'Editar'" :icon="'ffas fa-money-check-alt'"></HeadPage>
    <Breadcrumb
      :links="[{ name: 'Pagamento', route: 'list-formpayment' }]"
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
                    :to="{ name: 'list-formpayment' }"
                    title="Cancelar"
                    class="btn c-btn btn-danger mt-1 mb-1"
                    ><i class="fas fa-window-close"></i
                  ></router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12" v-if="this.formPaymentError.data">
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
                    {{ this.formPaymentError.data }}
                  </div>
                </div>
              </div>
              <EnableDisable
                :function="changeStatus"
                :enable="form.enable"
                :loading="loading"
              ></EnableDisable>
              <div class="col-md-12">
                <label for="name" class="form-label">Descrição</label>
                <input
                  type="text"
                  @change="clearErrors"
                  v-model.trim="form.description"
                  class="form-control"
                  id="description"
                />
              </div>
            </div>
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
import MaskMixin from "./../../mixins/MaskMixin";
import "vue-select/dist/vue-select.css";
import EnableDisable from "../../components/input/statusRegister/enableDisable";

export default {
  data() {
    return {
      form: {
      },
      loading: true
    };
  },
  components: {
    Breadcrumb,
    HeadPage,
    EnableDisable,
  },
  computed: {
    ...mapGetters({
      formPaymentError: "getFormPaymentError",
      formPayment: "getFormPayment",
    }),
  },
  mixins: [MaskMixin],
  methods: {
    ...mapActions({
      updateFormPayment: "updateFormPayment",
      clearErrors: "clearErrors",
      fetchFormPayment: "fetchFormPayment",
    }),
    async editformPayment(uuid) {
      await this.fetchFormPayment(uuid);
      this.form = this.formPayment;
    },
    async changeStatus(vlr) {
      this.form.enable = vlr;
    },
    async formAction() {
      await this.updateFormPayment(this.form);
      if (!this.formPaymentError.data) {
        return this.$router.push({ name: "list-formpayment" });
      }
    },
  },
  mounted: function () {
    this.importMask();
  },
  created() {
    this.clearErrors();
    this.editformPayment(this.$route.query.uuid);
  },
};
</script>

<style>
</style>