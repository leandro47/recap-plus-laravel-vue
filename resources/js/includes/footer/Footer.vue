<template>
    <footer class="py-4 bg-light mt-auto">
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-muted">
            Copyright &copy;
            <a class="text-reset fw-bold" href="https://leandro47.com/"
              >Leandro da Silva</a
            >
            {{ this.fullYear() }}
          </div>
          <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </footer>
</template>

<script>
export default {
  name: "Footer",
  methods: {
    fullYear() {
      let today = new Date();
      return today.getFullYear();
    },
  },
};
</script>

<style>
</style>