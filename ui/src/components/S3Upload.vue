<template>
  <div>
    <div id="image-select">
      <h3>Upload image to s3 bucket</h3>
      <form @submit.prevent>
        <input type="file" @change="PreviewFile" />
        <img :src="imgUrl" alt="preview" />
        <button :disabled="isDisableUpload" @click="uploadImage">Upload</button>
      </form>
    </div>
  </div>
</template>

<script>
import { computed, ref } from "vue";

export default {
  name: "s3Upload",
  setup() {
    const imgUrl = ref("");
    // const isDisableUpload = ref(true)

    function PreviewFile(event) {
      imgUrl.value = URL.createObjectURL(event.target.files[0]);
    }

    const isDisableUpload = computed(() => imgUrl.value === "")

    function uploadImage(e){

    }

    return {
      PreviewFile,
      imgUrl,
      uploadImage,
      isDisableUpload
    };
  },
};
</script>

<style scoped>
#image-select {
  width: 50vw;
  min-height: 500px;
  border: 2px solid green;
  padding: 5px;
  padding: 0 auto;
  text-align: center;
}

img {
  min-width: 100px;
  min-height: 100px;
  max-width: 110px;
  max-height: 110px;
  border: 2px solid green;
  padding: 5px;
}
</style>
