<template>
    <label v-if="lable" class="lable-c">{{lable}}</label>
<textarea class="form-control"
    
    input type="text" 
    :value="modelValue" 
    @input="$emit('update:modelValue', $event.target.value)"
    v-bind="$attrs"
    >
</textarea>
</template>




<script setup>
defineProps({
    lable: {
        type: [String, Boolean],
        
    },
    modelValue: {
        type: String,
    }
})
</script>

<style scoped>
.lable-c{
    color: rgb(255, 255, 255);
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
}

</style>