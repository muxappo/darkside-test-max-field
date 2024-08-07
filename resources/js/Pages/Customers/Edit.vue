<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { usePage } from "@inertiajs/vue3";

const csrfToken = usePage().props.csrfToken;
const customer = usePage().props.customer;
</script>

<template>
  <Head title="Customers" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Update Customer
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <header class="p-4 text-gray-900">Edit Customer Details:</header>

          <form
            :action="route('customers.update')"
            class="px-4 pb-4"
            method="post"
          >
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="id" :value="customer.id" />
            <div class="pb-2">
              <InputLabel for="first_name" value="First Name" />
              <Input
                id="first_name"
                name="first_name"
                :value="customer.first_name"
                class="w-1/4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              />
            </div>
            <div class="py-2">
              <InputLabel for="last_name" value="Last Name" />
              <Input
                id="last_name"
                name="last_name"
                :value="customer.last_name"
                class="w-1/4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              />
            </div>
            <div class="py-2">
              <InputLabel for="email" value="Email" />
              <Input
                id="email"
                name="email"
                :value="customer.email"
                class="w-1/4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              />
            </div>
            <div class="py-2">
              <InputLabel for="phone" value="Phone" />
              <Input
                id="phone"
                name="phone"
                :value="customer.phone"
                class="w-1/4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              />
            </div>
            <div class="pt-2">
              <PrimaryButton>Save</PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
