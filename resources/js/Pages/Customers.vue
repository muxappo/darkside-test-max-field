<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

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
          <header class="py-4 text-gray-900">All Customers</header>
          <table>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>

            <tr v-for="(customer, index) in customers">
              <td>{{ customer.id }}</td>
              <td>{{ customer.first_name }}</td>
              <td>{{ customer.last_name }}</td>
              <td>{{ customer.email }}</td>
              <td>{{ customer.phone }}</td>
              <td>
                <a :href="customer.viewUrl">View</a>
                <a :href="customer.deleteUrl">Delete</a>
              </td>
            </tr>
          </table>
          <button
            class="items-center my-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
          >
            <a :href="route('customers.create')">Create Customer</a>
          </button>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
