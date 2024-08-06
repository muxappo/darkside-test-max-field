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
          <header class="p-6 text-gray-900">Update Customer</header>
          <form :action="route('customers.update')" class="m-4" method="post">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="id" :value="customer.id" />
            <div>
              <InputLabel for="first_name" value="First Name" />
              <Input
                id="first_name"
                name="first_name"
                :value="customer.first_name"
              />
            </div>
            <div>
              <InputLabel for="last_name" value="Last Name" />
              <Input
                id="last_name"
                name="last_name"
                :value="customer.last_name"
              />
            </div>
            <div>
              <InputLabel for="email" value="Email" />
              <Input id="email" name="email" :value="customer.email" />
            </div>
            <div>
              <InputLabel for="phone" value="Phone" />
              <Input id="phone" name="phone" :value="customer.phone" />
            </div>
            <div>
              <PrimaryButton>Save</PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
