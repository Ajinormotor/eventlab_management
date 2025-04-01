<script setup>
import { ref } from 'vue';


const props = defineProps({
  listingImage: String
})
const emit = defineEmits(['file']);



const defaultImage = '/storage/image/default_user.png';
const currentImage =props.listingImage 
? `/storage/${props.listingImage}`
: defaultImage


const preview = ref(currentImage); 

const OverSizedImage = ref(false);
const showRevertButton = ref(false);

const imagePreview = (e) => {
    const file = e.target.files[0];

    if (file) {
        if (file.size > 10 * 1024 * 1024) { 
            OverSizedImage.value = true;
            preview.value = currentImage; 
            showRevertButton.value = false;
        } else {
            preview.value = URL.createObjectURL(file);
            OverSizedImage.value = false;
            showRevertButton.value = true;
            emit('file', file); 
        }
    }
};

const revertImage = () => {
    preview.value = currentImage;
    OverSizedImage.value = false;
    showRevertButton.value = false;
    emit('file', null); 
};
</script>

<template>
  <section class="w-full flex items-center justify-center">
    <div class="rounded-full md:w-[150px] md:h-[150px] relative">
      <label for="image" class="rounded-full md:w-[150px] md:h-[150px] relative">
        <img 
          :src="preview" 
          alt="Profile Image"
          class="rounded-full w-full h-full object-cover" />
      </label>

      <button 
        v-if="showRevertButton"
        @click="revertImage"
        class="bg-white rounded-full w-[20px] h-[20px] flex shadow-sm cursor-pointer
        items-center justify-center absolute right-[30px] top-0">
        <i class="ri-close-line"></i>
      </button>

      <input 
        @change="imagePreview"
        type="file" 
        name="image" 
        id="image"
        class="hidden" />

      <h1 v-if="OverSizedImage" class="text-red-500 text-sm">
        The image shouldn't exceed 10MB!
      </h1>
    </div>
  </section>
</template>