<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const page = usePage()
const pedidos = page.props.pedidos
console.log(pedidos)
</script>

<template>
    <Head title="Pedidos PSA" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">PEDIDOS PSA</h2>
            <Link :href="route('psapedido.create')">
                Hacer un pedido
            </Link>
        </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div className="relative overflow-x-auto">
                        <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" className="px-6 py-3">
                                        Dirección
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Telefono
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Producto
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="pedido in pedidos" className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{pedido.direccion}}
                                    </th>
                                    <td className="px-6 py-4">
                                        {{ pedido.telefono }}
                                    </td>
                                    <td className="px-6 py-4">
                                        <img class="h-12" :src="`/storage/${pedido.avatar}`" />
                                    </td>
                                    <td className="px-6 py-4">
                                        <Link :href="route('psapedido.edit', pedido)">
                                           editar
                                        </Link>
                                    </td>
                                    <!-- <td className="px-6 py-4">
                                        // añades tu imagen
                                    </td>
                                    <td className="px-6 py-4">
                                        // añades las acciones
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
