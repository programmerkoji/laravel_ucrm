<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";

const emitTest = e => console.log(e);
</script>

<template>
    <GuestLayout>
        <InputLabel value="件名">タイトル</InputLabel>
        <TextInput
            modelValue="初期値がはいります"
            @update:modelValue="emitTest"
        ></TextInput>
    </GuestLayout>
</template>
