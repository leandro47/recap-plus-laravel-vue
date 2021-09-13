<template>
  <div class="col-md-2 col-sm-6 col-xl-1 center con-switch">
    <vs-switch @change="newStatus" :loading="loading" v-model="status">
      <template #off v-if="!loading"> <i class="fas fa-lock"></i> &nbsp; inativo </template>
      <template #on v-if="!loading"> <i class="fas fa-lock-open"></i> &nbsp; ativo </template>
    </vs-switch>
  </div>
</template>
  
  <script>
export default {
  data() {
    return {
      status: null,
    }
  },
  props: {
    enable: {
      typeof: String,
      required: true,
    },
    function: {
      type: Function,
      required: true,
    },
    loading: {
      typeof: Boolean,
      required: true,
    }
  },
  methods: {
    newStatus() {
      if (this.status == true) {
        this.function("Y");
      } else {
        this.function("N");
      }
    },
    setStatus(){
      if (this.enabled == 'Y') {
        this.status = true;
      } else {
        this.status = false;
      }
    }
  },
  created() {
    this.setStatus();
  }
};
</script>