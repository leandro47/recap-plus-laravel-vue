<template>
  <div id="layoutAuthentication_content">
    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
              <div class="card-header">
                <h3 class="text-center font-weight-light my-4">DevHouse</h3>
              </div>
              <div class="card-body">
                <form>
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
                      class="btn btn-primary"
                      type="button"
                      @click.prevent="login"
                      >Entrar</a
                    >
                    <hr>
                    <div class="text-center text-muted">
                      version 1.0.0
                    </div>
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
      error: "fetchUserError",
      user: "fetchUser",
    }),
  },
  methods: {
    ...mapActions({
      authUser: "authUser",
    }),
    async login() {
      await this.authUser(this.form);

      if (!this.error.length) {
        return this.$router.push({ name: "Dashboard" });
      }
    },
  }
};
</script>

<style scoped>
</style>