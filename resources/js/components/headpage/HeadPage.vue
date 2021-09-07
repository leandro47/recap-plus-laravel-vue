<template>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i :class="icon"></i> {{title}}</h1>
  </div>
</template>

<script>
export default {
    name: "HeadPage",
    props: {
        title: {
            type: String,
            required: true
        },
        icon: {
          type: String,
          required: true
        }
    }
};
</script>

<style>
</style>