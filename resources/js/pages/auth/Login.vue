<template>
  <div class="background" id="layoutAuthentication_content">
    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
              <div class="card-header">
                <h3 class="text-center font-weight-light my-4">RecapPlus</h3>
              </div>
              <div class="card-body">
                <form>
                  <div v-if="this.errors.data !== null"
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                  >
                    <strong>Ops!</strong> {{this.errors.data}}
                  </div>
                  <div class="form-floating mb-3">
                    <input
                      class="form-control"
                      id="inputEmail"
                      type="email"
                      v-model="form.email"
                      placeholder="name@example.com"
                    />
                    <label for="inputEmail">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input
                      class="form-control"
                      id="inputPassword"
                      type="password"
                      v-model="form.password"
                      placeholder="Password"
                    />
                    <label for="inputPassword">Senha</label>
                  </div>
                  <div class="d-grid gap-2">
                    <a
                      class="btn c-btn-primary"
                      type="button"
                      @click.prevent="login"
                      ><i class="fas fa-sign-in-alt"></i> Entrar</a
                    >
                    <hr />
                    <div class="text-center text-muted">version 1.0.0</div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
    };
  },
  computed: {
    ...mapGetters({
      errors: "fetchUserError",
      user: "fetchUser",
    }),
  },
  methods: {
    ...mapActions({
      authUser: "authUser",
      clearUserErrors: "clearUserErrors"
    }),
    async login() {
      await this.authUser(this.form);

      if (!this.errors.data) {
        return this.$router.push({ name: "dashboard" });
      }
    },
  },
  mounted: function () {
    this.clearUserErrors();
  }
};
</script>

<style scoped>
.background{
  background-color: #225884;
}
</style>