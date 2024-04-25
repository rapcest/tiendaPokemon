<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import FileInput from '@/Components/FileInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const variablesForm = {
    direccion: "",
    telefono: "",
    avatar: ""
}

const onSelectAvatar = (e) => {
    console.log(e.target.files)
    const files = e.target.files
    if(files.length){
        form.avatar = files[0]
    }
    console.log(form.avatar)
}
const form = useForm(variablesForm)

const submit = () =>{
    console.log('lol')
    form.post(route('psapedido.store'))

}

//funciones
</script>

<template>
    <Head title="Crear pedido PSA" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">CREAR PEDIDOS PSA</h2>
            <Link :href="route('psapedido.index')">
                Listado de pedidos
            </Link>
        </div>
        </template>

        <div class="py-12 ">
            <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-3 flex justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form class="py-5 w-1/3 space-y-3" @submit.prevent="submit">
                        <div>
                            <InputLabel for="direccion" value="dirección" />

                            <TextInput id="direccion" type="text" class="mt-1 block w-full" v-model="form.direccion"
                             autofocus autocomplete="direccion"
                            />

                            <InputError class="mt-2 mb-2" :message="form.errors.direccion" />
                        </div>

                        <div>
                            <InputLabel for="telefono" value="Teléfono" />

                            <TextInput id="telefono" type="text" class="mt-1 block w-full" v-model="form.telefono"
                                 autofocus autocomplete="telefono" />

                            <InputError class="mt-2" :message="form.errors.telefono" />
                        </div>

                        <div>
                            <InputLabel for="avatar" value="Avatar" />

                            <FileInput id="avatar" class="mt-1 block w-full" @change ="onSelectAvatar"
                                 autofocus autocomplete="avatar" />

                            <InputError class="mt-2" :message="form.errors.avatar" />

                        </div >

                        <div class="flex justify-center">
                            <PrimaryButton class="mt-2" >
                                hacer pedido
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
