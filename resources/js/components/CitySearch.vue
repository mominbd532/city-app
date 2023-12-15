<template>
  <div>
    <div class="m-5">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input
          type="text"
          class="form-control"
          placeholder="Search..."
          aria-label="Search"
          aria-describedby="basic-addon1"
        />
      </div>
    </div>
  </div>
</template>
  
  <script>
export default {
  data() {
    return {
      name: "Vue 3 with Laravel and Vite",
    };
  },
};
</script>
  
  <style scoped>
/* Add your component-specific styles here */
</style>