<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { usePage } from "@inertiajs/vue3";

const csrfToken = usePage().props.csrfToken;
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
          <header class="p-4 text-gray-900">Enter Customer Details:</header>

          <form
            :action="route('customers.store')"
            class="px-4 pb-4"
            method="post"
          >
            <input type="hidden" name="_token" :value="csrfToken" />

            <div class="pb-2">
              <InputLabel for="first_name" value="First Name" />
              <TextInput
                class="w-1/4"
                id="first_name"
                name="first_name"
                required
              />
            </div>

            <div class="py-2">
              <InputLabel for="last_name" value="Last Name" />
              <TextInput
                class="w-1/4"
                id="last_name"
                name="last_name"
                required
              />
            </div>

            <div class="py-2">
              <InputLabel for="email" value="Email" />
              <TextInput class="w-1/4" id="email" name="email" required />
            </div>

            <div class="py-2">
              <InputLabel for="phone" value="Phone" />
              <TextInput class="w-1/4" id="phone" name="phone" required />
            </div>
            <div class="pt-4">
              <PrimaryButton>Save</PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
