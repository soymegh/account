

    <template>
        <AppLayout title="Rate Group">
          <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Rate Group
            </h2>
          </template>
      
          <div class="py-12 ">
            <div class="container mx-auto sm:px-6 lg:px-8 bg-white p-10 shadow-xl"><!-- max-w-7xl -->
              <div>
                <div class="flex items-center justify-start mb-10">
                  <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
      
                  
                    <div class="flex items-center justify-center">
                      <div class="inline-flex" role="group">
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                          <button id="show-modal" @click="showModal = true ; selected = null ;" type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 transition ease-in-out ">
                            <svg class="mr-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                          
                            Create
                          </button>
      
                          <button @click="item_delete" type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-r border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 transition ease-in-out">
                            <svg class="mr-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Delete
                          </button>
                          <div>
      
                          </div>
                          <button type="button" class=" inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 transition ease-in-out">
                            <svg class="mr-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            Import
                          </button>
      
                          <button type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 transition ease-in-out">
                            <svg class="mr-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Export
                          </button>
                       </div>
                      </div>
                    </div>
      
                    </div>
                </div>
              </div>
      
              <div class="bg-white overflow-hidden  sm:rounded-lg ">
                <table class="table-auto w-full border">
                  <thead>
                    <tr class="bg-gray-100 border-b">
                      <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 border-r">
                          <label
                              class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                              <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" >
                          </label>
                      </th>
                      <th class="p-3 border-r">Name</th>
                      <th class="p-3 border-r">Initial Increment</th>
                      <th class="p-3 border-r">Increment</th>
                      <th class="p-3 border-r">Markup (%)</th>
                      <th class="p-3 border-r">Created Date</th>
                      <th class="p-3 border-r">Modified Date</th>
                       <th class="p-3 border-r">Status</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-if="data" v-for="rateG in rateGroup" :key="rateGroup.id" class="hover:bg-slate-200 transition-all ease " >
                      <td class="border-dashed border-t border-gray-200 px-3">
                          <label 
                              class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                              <input @click="add_check" :value = rateG.id type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline">
                          </label>
                      </td>
                      <td class="border-dashed border border-gray-200 px-3 py-3">{{ rateG.name }}</td>
                      <td class="border-dashed border border-gray-200 px-3 py-3">{{ rateG.markup }}</td>
                      <td class="border-dashed border border-gray-200 px-3 py-3">{{ rateG.init_increment }}</td>
                      <td class="border-dashed border border-gray-200 px-3 py-3">{{ rateG.increment }}</td>
                      <td class="border-dashed border border-gray-200 px-3 py-3">{{ format_date(rateG.created_at) }}</td>
                      <td class="border-dashed border border-gray-200 px-3 py-3">{{ format_date(rateG.updated_at )}}</td>
                      <td class="border-dashed border border-gray-200 px-3 py-3">
                        <label :for="rateG.id" class="inline-flex relative items-center cursor-pointer">
      
                          <input @click="change_status" v-if=" rateG.status == 'Active'" checked type="checkbox" value="" :id="rateG.id" class="sr-only peer z-50"/>
      
                          <input @click="change_status" v-else type="checkbox" value="" :id="rateG.id" class="sr-only peer"/>
      
                          <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                      </td>
      
                      <td class="border-dashed border border-gray-200 px-3 py-3">
                        <div class="flex justify-center">
                          <div class="p-1 rounded bg-green-500 text-white hover:bg-green-600 ease transition cursor-pointer" @click="selected = rateGroup ; showModal = true" >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                          </div>
                        </div>
                      </td>
                      
                    </tr>

                    <tr v-else>
                      <td class="border-dashed border border-gray-200 px-3 py-3" col="3">There is no information</td>
                    </tr>
                  </tbody>
                </table>
                <pagination class="mt-6" :links="rateGroup.links" />
              </div>
            </div>
          </div>
      
        <CreateModal v-if="showModal" @close="showModal = false" :dataO="selected">
        </CreateModal>
      
        </AppLayout>
      </template>
      
<script setup>
import { onMounted } from 'vue';
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from '@/Components/Pagination.vue'
import PrimaryButton from "@/Components/PrimaryButton.vue";
import CreateModal from "@/Pages/OriginationRates/Create.vue";
import GetOriginationRates from "@/Components/GetOriginationRates.vue";
</script>
    
<script>

export default {

props: [
    'rateGroup',
    'success_message',
    'data'
],

data() {
    return {
    showModal  : false,
    checked : true,
    selected : null
    } 
}, 

components: {
    AppLayout,
    Pagination
},

methods: {
    format_date(date) {
       /*  let arr = date.split('T'); 

        return arr[0]; */

        return date
    },
    },
} 

let select = [];

function add_check(event) {

    if ( select.includes(event.target.value) ) {

    select = select.filter((item) => item !== event.target.value )
    
    } else {

    select.push(event.target.value);

    }
}

function change_status(event) {
    if (event) {
        Inertia.post( route('api.origination-rates.change-status'), {
        "id" : event.target.id
        },{
        onSuccess: (page) => {
            Toast.fire({
                icon: 'success',
                iconColor: 'white',
                background:'#53B96A',
                color : 'white',
                title: "State changed successfully."
            })
        },
        onError: (errors) => {
            console.log(errors);
        },
        });
    }
}

function item_delete() {

    if ( select.length ) {
        
        Inertia.post( route('api.origination-rates.destroy') , {
        'data' : select
        },{
        onSuccess: (page) => {
            Toast.fire({
                icon: 'success',
                iconColor: 'white',
                background:'#53B96A',
                color : 'white',
                title: "Data deleted successfully."
            })
            select = [];
        },
        onError: (errors) => {
            console.log("error");
        },
        });

    } else {
        Toast.fire({
            icon: 'error',
            iconColor: 'white',
            background:'#DD3848',
            color : 'white',
            title: 'Select one or more boxes.'
        })
    }
}


</script>
          


<!-- <th class="p-3 border-r">Name</th>
<th class="p-3 border-r">Initial Increment</th>
<th class="p-3 border-r">Increment</th>
<th class="p-3 border-r">Markup (%)</th>
<th class="p-3 border-r">Created Date</th>
<th class="p-3 border-r">Modified Date</th>
<th class="p-3 border-r">Status</th> -->