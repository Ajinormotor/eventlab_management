<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    user: Object
});

const form = useForm({
    role: props.user?.role ?? "user"
});

const submitRole = () => {
    if (confirm(`Change role to ${form.role}?`)) {
        form.put(route('admin.user.update', {user : props.user.id }));
    } else {
        form.role = props.user.role; 
    }
};

console.log("Updating user with ID:", props.user.id);


</script>

<template>
  <section v-if="props.user">

    <form @change="submitRole" class="flex">
      <label for="role" class="sr-only text-green-400">Role:</label>
      <select id="role" name="role" v-model="form.role"
              class="text-black border border-green-500 rounded-lg py-2">
        <option value="user">User</option>
        <option value="admin">Admin</option>
        <option value="suspended">Suspended</option>
      </select>
    </form>

  </section>
</template>
