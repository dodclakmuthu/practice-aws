<template>
  <div>
    <ul>
      <li><router-link to="/"> {{ "Home" }}</router-link></li>
      <li><router-link to="/s3/upload"> {{ "Upload image" }}</router-link></li>
    </ul>
    <h3>S3 related</h3>
    <router-view />
  </div>
</template>

<script>
export default {
  name: "S3View",
};
</script>

<style scoped>
    ul{
        width: 100%;
        display: flex;
        justify-content: center;
        list-style: none;
    }
    li{
        margin: 10px;
    }
</style>
