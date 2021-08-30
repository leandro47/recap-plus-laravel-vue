<template>
    <footer class="py-4 bg-light mt-auto">
      <div class="container-fluid px-4">
        <div class="small">
          <div class="text-muted text-center">
            Copyright &copy;
            <a class="text-reset fw-bold" href="https://leandro47.com/"
              >Leandro da Silva</a
            >
            {{ this.fullYear() }}
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