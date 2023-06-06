<script>

    import {Inertia} from '@inertiajs/inertia';
    import InputError from '@/Components/InputError.vue'


    export default {

        props: [
            'dataO'
        ],
        
        components : {
            InputError,
            
        },

        mounted() {

            if ( this.dataO != null) {
                this.id = this.dataO.id;
                this.email = this.dataO.email;
                this.rategroup_id = this.dataO.rategroup_id;
                this.status = this.dataO.status;
            }

        },

        data () {
            return {
                id              : 0 ,
                email           : "",
                rategroup_id    : "",
                status          : "",
                errors : {
                    email : "",
                    rategroup_id : "",
                },
                
            }
        },
        methods: {
            submit() {

                let count_error = 0;

                this.formValidation();

                Object.entries(this.errors).forEach(Element => {

                    if (Element[1] != "") {
                        count_error++;

                        } else {
                    }
                });

                if ( count_error > 0 ) {
                    
                    Toast.fire({
                        icon: 'error',
                        iconColor: 'white',
                        background:'#DD3848',
                        color : 'white',
                        title: 'Fill in the required fields.'
                    })

                } else {

                    if( this.id == 0 ) {
                        Inertia.post( route('api.reseller.store') , {
                            email           : this.email,
                            rategroup_id    : this.rategroup_id,
                            status          : this.status,
                        },{
                            onSuccess: (page) => {
                                console.log(page);
                                Toast.fire({
                                icon: 'success',
                                iconColor: 'white',
                                background:'#53B96A',
                                color : 'white',
                                title: "Successfully created."
                            });
        
                            this.email = "",
                            this.rategroup_id = "",
                            this.status = ""
                        },
                            onError: (errors) => {
                                console.log("error");
                            },
                        });

                    } else {

                        Inertia.post( route('api.reseller.update'),{
                            id              : this.id,
                            email           : this.email,
                            rategroup_id    : this.rategroup_id,
                            status          : this.status
                        },{
                            onSuccess: (page) => {
                                Toast.fire({
                                icon: 'success',
                                iconColor: 'white',
                                background:'#53B96A',
                                color : 'white',
                                title: "It updated successfully."
                            });
                        }});

                    }
                }
            },

            formValidation() {
                
                if (this.email == '') {
                    this.errors.email = "Email is required."

                } else {
                    this.errors.email = ''
                }

                if (this.rategroup_id == '') {
                    this.errors.rategroup_id = "Rate Group is required."

                } else {
                    this.errors.rategroup_id = ''
                }

            },
        }

        

    }
</script>

<template>
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="" style="position: fixed;    z-index: 10; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100% !important; 
    overflow: auto !important; 
    background-color: rgba(0,0,0,0.4) !important; ">
    <div class="relative p-4 w-3/5 h-full md:h-auto top-20 mx-auto border shadow-lg rounded-md bg-white">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create Reseller
                </h3>
                <button @click="$emit('close')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                
                    <form class="w-full max-w-full" @submit.prevent="submit">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class ="p-5 bg-blue-100 ">Panel Access</h3>
                                <div class="bg-blue-50 p-5">
                                    <div class="flex flex-wrap mb-6">
                                        <div class="w-full  px-3">
                                            <label v-bind:title="'Ingrese su correo'" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-destination">
                                                Email *
                                            </label>
                                            <input v-model="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400" id="grid-name" type="email" placeholder="">
                                            <InputError v-show="errors.email != ''" :message="errors.email" />
                                    
                                            </div>
                                            <div class="w-full px-3 mt-6">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                                Status
                                            </label>
                                            <div class="flex appearance-none w-full bg-gray-200 border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded">
                                                <div class="flex items-center mr-4">
                                                    <input @click="status = 'Active'" id="inline-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-500 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                                                </div>  
                                                <div class="flex items-center mr-4">
                                                    <input @click="status = 'Desactive'" id="inline-2-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-500 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 ">Desactive</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                 
                                </div>
                            </div>
                            <div>
                                <h3 class ="p-5 bg-blue-100 ">Billing Settings</h3>
                                <div class="bg-blue-50 p-5">
                                    <div class="flex flex-wrap ">
                                        <div class="w-full px-3">

                                            
                                            <label v-bind:title="'Texto'" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-destination">
                                                Rate Group *
                                            </label>

                                            <select v-model="rategroup_id" class="block appearance-none w-full bg-gray-200 border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400" id="grid-state">
                                                <option value="0">default</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="defaultModal" type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition ease-in">Save</button>

                <button @click="$emit('close')" data-modal-toggle="defaultModal" type="button" class="text-black bg-red-100  hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-500 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition ease-in">Close</button>
            
            </div>
            </form>
            </div>
            <!-- Modal footer -->
          
        </div>
    </div>
</div>
</template>
