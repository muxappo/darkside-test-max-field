<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
</script>

<template>
  <Head title="Customers" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Customer
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <header class="p-6 text-gray-900">Create Customer</header>
          <form action="" class="m-4">
            <div>
              <InputLabel for="first_name" value="First Name" />
              <TextInput id="first_name" />
            </div>
            <div>
              <InputLabel for="last_name" value="Last Name" />
              <TextInput id="last_name" />
            </div>
            <div>
              <InputLabel for="email" value="Email" />
              <TextInput id="email" />
            </div>
            <div>
              <InputLabel for="phone_no" value="Phone" />
              <TextInput id="phone_no" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
