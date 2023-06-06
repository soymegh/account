<template>
    <AppLayout title="Create User">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <Link :href="route('users.create') "> Cancel</link>

                    <form @submit.prevent="submit" class="grid grid-cols-2 ">
                        <div class="p-2 ">
                            <label  for="full_name">Full Name</label>
                            <div>
                                <input class="w-full border-2 border-inherit" id="first_name" type="text" v-model="name" placeholder="Full Name"/>
                            </div>

                        </div>
                        <div class="p-2 ">
                            <label  for="user_name">User Name</label>
                            <div>
                                <input class="w-full border-2 border-inherit" id="first_name" type="text" v-model="username" placeholder="User Name"/>
                            </div>
                        </div>
                        <div class="p-2">
                            <label for="password">Password</label>
                            <div>
                                <input class="w-full border-1 border-inherit" id="last_name" type="password" v-model="password" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="p-2">
                            <label for="password_confirmation">Password Confirmation</label>
                            <div>
                                <input class="w-full border-1 border-inherit" id="last_name" type="password" v-model="passwordconfirmation" placeholder="Password Confirmation"/>
                            </div>
                        </div>
                        <div class="p-2">
                            <label for="email">Email</label>
                            <div>
                                <input class="w-full border-1 border-inherit" id="email" type="email" v-model="email" placeholder="E-mail"/>
                            </div>
                        </div>
                        <div class="p-2">
                            <label for="tenant">Tenant</label>
                            <div>
                                <select name="" id="" class="w-full border-1 border-inherit ">
                                    <option value="" selected >VitalPBX</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2">
                            <label for="role">Role</label>
                            <div>
                                <select name="" id="" class="w-full border-1 border-inherit ">
                                    <option value="" selected >Role</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2">
                            <label for="systempermision">System Permission</label>
                            <div>
                                <select name="" id="" class="w-full border-1 border-inherit ">
                                    <option value="" selected >all</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-20 h-15 rounded-sm text-white bg-green-500 hover:bg-green-700 flex items-center cursor-pointer mt-5 ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <path fill-rule="evenodd" d="M5.478 5.559A1.5 1.5 0 016.912 4.5H9A.75.75 0 009 3H6.912a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H15a.75.75 0 000 1.5h2.088a1.5 1.5 0 011.434 1.059l2.213 7.191H17.89a3 3 0 00-2.684 1.658l-.256.513a1.5 1.5 0 01-1.342.829h-3.218a1.5 1.5 0 01-1.342-.83l-.256-.512a3 3 0 00-2.684-1.658H3.265l2.213-7.191z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v6.44l1.72-1.72a.75.75 0 111.06 1.06l-3 3a.75.75 0 01-1.06 0l-3-3a.75.75 0 011.06-1.06l1.72 1.72V3a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                            </svg>

                            <button type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import AppLayout from "../../Layouts/AppLayout.vue";

export default {

    props:['users'],
/*    data:{

    },*/
    components: {
        AppLayout,
    },
    methods:{

    }
}
</script>
