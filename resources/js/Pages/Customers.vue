<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const customers = usePage().props.customers;
</script>

<template>
  <Head title="Customers" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Customers
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <header class="py-4 text-gray-900">Customer Details</header>

          <!-- conditional rendering of the table; only displays the table when the customers array contains data to fill the cells -->

          <table v-if="customers.length > 0" class="w-full">
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>

            <!-- v-for loop to iterate through the customers array and build the frontend table -->

            <tr v-for="(customer, index) in customers">
              <td>{{ customer.first_name }}</td>
              <td>{{ customer.last_name }}</td>
              <td>{{ customer.email }}</td>
              <td>{{ customer.phone }}</td>
              <td class="pt-2">
                <PrimaryButton class="mr-2">
                  <a :href="customer.viewUrl">View / Edit</a>
                </PrimaryButton>
                <PrimaryButton>
                  <a :href="customer.deleteUrl">Delete</a>
                </PrimaryButton>
              </td>
            </tr>
          </table>

          <!-- if no data is retrieved, a notice message to create an entry is displayed instead -->

          <p v-else>
            Notice: No customers available, please click below to create a new
            entry.
          </p>
          <PrimaryButton class="mt-4">
            <a :href="route('customers.create')">Create New Entry </a>
          </PrimaryButton>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
