<!-- la funcion $t, es para los idiomas...en este caso, tienes que investigar como se gestiona los lenguajes con
    inertiajs, laravel y vue.  De momento lo dejaremos con cadenas estaticas
 -->
<template>
    <section class="app-sidebar z-[2000]">
        <nav
            id="sidebar"
            :class="[
                'transition-all fixed flex-wrap items-stretch bg-white flex min-h-[calc(100vh-58px)] p-0 w-[320px] shadow-lg',
                {
                  'left-0': open,
                  '-left-[290px]': !open,
                }
            ]"
        >
            <ul class="flex bg-[#f2f2f2] overflow-hidden flex-nowrap flex-col w-[inherit] relative p-0">
                <li class="nav-profile py-3 px-2">
                    <div class="flex h-auto p-0 flex-row justify-left text-left float-left mr-auto">
                        <div class="relative m-auto rounded-full border-2 border-solid border-white">
                            <!-- agregar el archivo a los assets de la app, de momento pondre una url  -->
                            <img
                                class="bg-[#ececec] w-[50px] h-auto rounded-full"
                                src="data:image/png;base64,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"
                            >
                            <span class="online-status online" />
                        </div>
                        <div class="transition-all text-left pl-3">
                            <p class="font-bold text-shadow-sm text-[#796B00] capitalize">
                                {{ getUser.name }}
                            </p>
                            <div v-if="hasRole('admin')" id="selected-tenant" :class="{
                                    'font-semibold flex p-1 cursor-pointer hover:text-[#5D5200FF]': true,
                                    'hidden': loadingTenants}" @click="dropdown = !dropdown">
                                <div>
                                    <span>
                                        {{ selectedTenantInfo }}
                                    </span>
                                    <span class="px-2">
                                        <i :class="{'fas fa-caret-down': true, 'fa-rotate-180': dropdown}"/>
                                    </span>
                                </div>
                            </div>
                            <div
                                v-if="dropdown"
                                id="drop-down"
                                 class="flex fixed flex-col p-2 bg-white z-10 rounded-md space-y-2 shadow-lg"
                            >
<!--                                estilizar este input-->
                                <input
                                    v-model="search"
                                    type="search"
                                    class="search"
                                    :placeholder="'search'"
                                    size="sm"
                                />
                                <div class="divide-y">
                                    <template  v-for="(item, i) in filteredTenants" :key="i">
                                        <div  :class="{ 'cursor-pointer p-2 hover:bg-gray-100': true, 'text-primary': item.tenant_id.toString() === currentTenant.toString()                      }"
                                            @click="setTenant(item.tenant_id)">
                                            {{ item.description }}
                                        </div>
                                    </template>
                                    <span v-if="!filteredTenants.length" class="block p-2 text-sm text-gray-500 text-center">
                                        {{ 'no_results' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <div class="px-2 py-0 tabs-container flex-grow">
                    <div class="h-full capitalize flex flex-wrap -mx-3.5">
                        <!-- col auto  -->
                        <div class="bg-white flex h-[100vh] justify-center max-w-[120px] p-0 w-auto flex-auto">
                            <div class="w-full bg-transparent border-0 p-0 flex overflow-hidden flex-nowrap relative flex-col">
                                <!-- tabs -->
<!--

if(si el index es 0, el cual es el dashboard, redirigiar a la ruta dashboard)
                                        else tabIndex = index;
                                        -->

                                <li
                                    role="presentation"
                                    v-for="(tab, index) in tabs"
                                    :key="index"
                                    @click="tabIndex = index"
                                >
                                    <a
                                        :class="[
                                          'flex font-semibold px-2 py-3 flex-col  justify-center text-center items-center rounded-tr-md rounded-br-md cursor-pointer !no-underline',
                                          {
                                            'bg-[#796B00] text-white  hover:bg-[#5D5200FF]': tabIndex === index,
                                            'hover:bg-[#9E8C02FF] text-[#796B00] hover:text-white': tabIndex !== index,
                                          }
                                        ]"
                                    >
                                        <i
                                            :class="[
                                                `text-xl ${tab.icon}`,
                                                {
                                                  'hover:text-[#796B00]': tabIndex !== index,
                                                  'text-white': tabIndex === index
                                                },
                                              ]"
                                        />
                                        <span>
                                          {{ tab.title }}
                                        </span>
                                    </a>
                                </li>
                            </div>
                        </div>
                        <div class="px-0 flex-grow max-w-full overflow-x-hidden">
                            <template v-for="(tab, index) in tabs" :key="index">
                                <div
                                    role="tabpanel"
                                    :class="[
                                        'transition-opacity -translate-x-96 duration-[800ms] ease-out opacity-0 h-0',
                                        {
                                          '!transform-none !opacity-100 !h-auto': tabIndex === index,
                                        }
                                      ]"
                                >
                                    <div
                                        :key="i"
                                        class="flex items-center justify-start text-gray-700"
                                        v-for="(item, i) in tab.items"
                                    >
                                        <li
                                            v-if="item.role ? hasRole(item.role) : checkRolePermission(item.permission)"
                                            :class="[
                                              'flex justify-start flex-grow text-sm whitespace-normal break-words capitalize leading-normal text-left flex-wrap h-auto ',
                                              {
                                                  // aqui verificar, si la ruta actual es esta (estado activa)
                                                '!bg-primary/5 text-[#796B00] font-semibold': true,
                                                 // aqui verificar, si la full ruta actual es esta (estado activa)
                                              }
                                            ]"
                                        >

                                                <Link
                                                    :class="{ active: isActive === route(item.route)}"
                                                    class="px-3 py-4 flex-1 cursor-pointer hover:bg-[#A0986CA8]   !no-underline space-x-2"
                                                    :href="route(item.route)"
                                                >
                                                    <em :class="`${item.icon}`" />
                                                    <span>
                                                        {{ item.name }}
                                                    </span>
                                                </Link>
                                        </li>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </ul>
            <!-- toggle btn -->
            <div
                :class="[
                  'transition-all text-sm font-medium uppercase select-none box-border flex justify-center items-center text-center bg-white cursor-pointer w-8 h-8 rounded-full border shadow-xl transition-transform z-[104] hover:bg-gray-50',
                  {
                    'absolute -right-3.5 top-[40%]': open,
                    'fixed -left-3 top-1/2': !open
                  }
                ]"
                @click="open = !open"
            >
                <div class="text-center cursor-pointer flex text-teal-700 relative">
                    <i
                        :class="{
                          'fas fa-chevron-left': open,
                          'fas fa-chevron-right': !open
                        }"
                    />
                </div>
            </div>
        </nav>
    </section>
</template>

<script>
import { permissions } from "../utils/permissions";
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'AppSidebar',
    components:{
      Link
    },
    data () {
        return {
            open: true,
            tabIndex: 0,
            permissions: permissions,
            dropdown: false,
            tenants: [],
            search: '',
            selectedTenant: null,
            loadingTenants: false
        }
    },
    props: {

    },
    watch: {
        open (newVal, oldVal) {
            // adjust the width of the main view
            const mainPanel = document.getElementById('main-panel')
            if (!newVal) {
                if (mainPanel) {
                    mainPanel.classList.add('full-main')
                }
            } else {
                if (mainPanel) {
                    if (window.innerWidth > 767) { mainPanel.classList.remove('full-main') }
                }
            }
        }
    },
    created () {
        /*  check if the current user has the super admin role */
        if (this.hasRole('admin')) {
            this.getTenants()
        }
    },
    mounted () {
        /*
            aqui, por ejemplo si un usuario accede directamente a una url,
            entonces se verifica y se activa el tab al cual pertenece
         */
        /*setTimeout(() => {
            // todo: aqui hay que volverlo dinamico
            this.tabIndex = 2
        }, 2200)*/
    },
    computed: {
        // aqui definis los tabs, con cada uno de suss items
        tabs () {
            const tabs = [
                {
                    title: 'ACCOUNTS',
                    icon: 'fa-solid fa-user-group',
                    items: [
                        {
                            name: 'Customers',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-user',
                            route: 'users.index'
                        },
                        {
                            name: 'Reseller',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-user-tag',
                            route: 'reseller.index'
                        },
                        {
                            name: 'Admins',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-user-gear',
                            route: 'users.index'
                        },
                        {
                            name: 'Roles & Permission',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-people-group',
                            route: 'users.index'
                        },
                    ]
                },

                {
                    title: 'BILLING',
                    icon: 'fa-solid fa-circle-dollar-to-slot',
                    items: [
                        {
                            name: 'Invoice',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-file-invoice',
                            route: 'dashboard'
                        },
                        {
                            name: 'Refill Reports',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-file-signature',
                            route: 'dashboard'
                        },
                        {
                            name: 'Commission Report',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-file-invoice-dollar',
                            route: 'dashboard',
                        },
                    ]
                },
                {
                    title: 'Inbound',
                    icon: 'fa-solid fa-arrow-down-long',
                    items: [
                        {
                            name: 'DIDs',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-hashtag',
                            route: 'dashboard',

                        },
                        {
                            name: 'Access Numbers',
                            permission: permissions.dashboard.dashboard,
                            icon: 'fa-solid fa-hashtag',
                            route: 'dashboard',
                        },
                    ]
                },

                {
                    title: 'TARIFF',
                    icon: 'fas fa-hand-holding-dollar',
                    items: [
                        {
                            name: 'Rate Groups',
                            permission: permissions.reports.agentsReport,
                            icon: 'fa-solid fa-comments-dollar',
                            route: 'rate-group.index',
                        },
                        {
                            name: 'Origination Rates',
                            permission: permissions.reports.dispositions,
                            icon: 'fa-solid fa-hand-holding-dollar',
                            route: 'origination-rates.index',
                        },
                        {
                            name: 'Rate Deck',
                            permission: permissions.reports.callsByAgent,
                            icon: 'fa-solid fa-award',
                            route: 'dashboard',
                        },
                        {
                            name: 'Call Types',
                            permission: permissions.reports.callsByAgent,
                            icon: 'fa-solid fa-phone',
                            route: 'dashboard',
                        }
                    ]
                },
                {
                    title: 'CARRIERS',
                    icon: 'fa-solid fa-bus',
                    items: [
                        {
                            name: 'Gateways',
                            permission: permissions.usersManagement.users,
                            icon: 'fa-solid fa-torii-gate',
                            route: 'dashboard',
                        },
                        {
                            name: 'trunks',
                            permission: permissions.usersManagement.pause_profiles,
                            icon: 'fa-solid fa-tower-cell',
                            route: 'users.create'
                        },
                        {
                            name: 'Termination Rates',
                            permission: permissions.usersManagement.roles,
                            icon: 'fa-solid fa-money-check-dollar',
                            route: 'users.index'
                        },

                    ]
                },

                {
                    title: 'SERVICES',
                    icon: 'fa-solid fa-house-laptop',
                    items: [
                        {
                            name: 'Products',
                            permission: permissions.settings.generalSettings,
                            icon: 'fa-solid fa-boxes-stacked',
                            route: 'dashboard',
                        },
                        {
                            name: 'Orders',
                            role: 'admin',
                            icon: 'fa-solid fa-boxes-packing',
                            route: 'dashboard',
                        },
                        {
                            name: 'Refill Coupons',
                            permission: permissions.pbx.pbxSettings,
                            icon: 'fa-solid fa-bolt',
                            route: 'dashboard',
                        },
                    ]
                },
                {
                    title: 'SWITCH',
                    icon: 'fa-solid fa-router',
                    items: [
                        {
                            name: 'SIP Profile',
                            permission: permissions.settings.generalSettings,
                            icon: 'fa-solid fa-mobile-screen-button',
                            route: 'dashboard',
                        },
                        {
                            name: 'Live Calls',
                            role: 'admin',
                            icon: 'fa-solid fa-phone-volume',
                            route: 'dashboard',
                        },
                        {
                            name: 'Localizations',
                            permission: permissions.pbx.pbxSettings,
                            icon: 'fa-solid fa-location-dot',
                            route: 'dashboard',
                        },
                    ]
                },
                {
                    title: 'REPORTS',
                    icon: 'fa-duotone fa-file-chart-pie',
                    items: [
                        {
                            name: 'Call Detail Reports',
                            permission: permissions.settings.generalSettings,
                            icon: 'fa-solid fa-square-poll-vertical',
                            route: 'dashboard',
                        },
                        {
                            name: 'Call Sumary Report',
                            role: 'admin',
                            icon: 'fa-solid fa-minimize',
                            route: 'dashboard',
                        },
                        {
                            name: 'Email History',
                            permission: permissions.pbx.pbxSettings,
                            icon: 'fa-solid fa-clock-rotate-left',
                            route: 'dashboard',
                        },
                        {
                            name: 'Activity Report',
                            permission: permissions.pbx.pbxSettings,
                            icon: 'fa-solid fa-chart-line',
                            route: 'dashboard',
                        },
                        {
                            name: 'Audit Log',
                            permission: permissions.pbx.pbxSettings,
                            icon: 'fa-solid fa-sliders',
                            route: 'dashboard',
                        },
                        {
                            name: 'Product Summary Reports',
                            permission: permissions.pbx.pbxSettings,
                            icon: 'fa-solid fa-book',
                            route: 'dashboard',
                        },
                        {
                            name: 'Low Balance',
                            permission: permissions.pbx.pbxSettings,
                            icon: 'fa-solid fa-scale-unbalanced-flip',
                            route: 'dashboard',
                        },
                    ]
                }, {
                    title: 'SETTINGS',
                    icon: 'fas fa-cogs',
                    items: [
                        {
                            name: 'Company Profile',
                            permission: permissions.settings.generalSettings,
                            icon: 'fa-solid fa-building-columns',
                            route: 'dashboard',
                        },
                        {
                            name: 'Taxes',
                            role: 'admin',
                            icon: 'fa-solid fa-coins',
                            route: 'dashboard',
                        },
                        {
                            name: 'Countries',
                            permission: permissions.pbx.pbxSettings,
                            route: 'dashboard',
                            icon: 'fa-solid fa-earth-americas',
                        },
                        {
                            name: 'Currencies',
                            permission: permissions.pbx.pbxSettings,
                            route: 'dashboard',
                            icon: 'fa-solid fa-wallet',
                        },
                        {
                            name: 'Database Backup',
                            permission: permissions.pbx.pbxSettings,
                            route: 'dashboard',
                            icon: 'fa-solid fa-database',
                        },
                        {
                            name: 'Timezone',
                            permission: permissions.pbx.pbxSettings,
                            route: 'dashboard',
                            icon: 'fa-solid fa-stopwatch',
                        },
                        {
                            name: 'Crons',
                            permission: permissions.pbx.pbxSettings,
                            route: 'dashboard',
                            icon: 'fa-solid fa-business-time',
                        },
                        {
                            name: 'Configurations',
                            permission: permissions.pbx.pbxSettings,
                            route: 'dashboard',
                            icon: 'fa-solid fa-screwdriver-wrench',
                        },
                        {
                            name: 'Language',
                            permission: permissions.pbx.pbxSettings,
                            route: 'dashboard',
                            icon: 'fa-solid fa-globe',
                        },
                    ]
                }
            ]
            /*
            aqui se verifica si el usuario tiene los permisos para acceder a un determinado modulo
            en caso de que no tenga permiso, el tab se remueve de la vista.
             */
            let av = []
            av = tabs.filter(tab => {
                const hasOnePermission = tab.items.some(i => {
                    if (i.role) {
                        return this.hasRole(i.role)
                    } else {
                        return this.checkRolePermission(i.permission)
                    }
                })
                if (hasOnePermission) {
                    return tab
                }
            })
            return av
        },
        currentTenant: {
            get () {
                return this.selectedTenant || 0
            }
        },
        selectedTenantInfo () {
            const tenant = this.tenants.find(t => t.tenant_id.toString() === this.currentTenant.toString())
            if (tenant) return tenant.description
            return 'unknown'
        },
        filteredTenants () {
            if (!this.tenants || !this.tenants.length) return []
            return this.tenants.filter(item => item.description.toLowerCase().indexOf(this.search.toLowerCase()) >= 0)
        },
    },
    methods: {
        // en esta funcion puedes redirigir al usuario a la ruta
        goTo (route) {
        },
        getUser () {
            // return user data
            return {
                name: 'John doe',

            }
        },
        hasRole (role) {
            // check if user has role
            return true
        },
        checkRolePermission (module) {
            // check if user has permission access to a specific module
            // return true or false
            return true
        },
        /* aqui haces un request para obtner los tenants, o tambien lo pones como una propiedad para que desde el backend te envien los datos */
        async getTenants () {
            try {
                this.loadingTenants = true
                // make api request to get vitalpbx tenants
                // const response = await axios.get(`${api.path}tenants`, api.config(params))
                const response = []
                this.tenants = []
                return
                if (Array.isArray(response.data.data)) {
                    this.tenants = response.data.data
                } else {
                    if (!this.isEmpty(response.data.data)) {
                        let tenant = response.data.data
                        tenant.tenant_id = tenant.tenant_id.toString()
                        await this.tenants.push(tenant)
                        // await this.$set(this.form, 'tenant_id', tenant.tenant_id)
                    }
                }
            } catch (e) {
                console.log(e)
            } finally {
                this.loadingTenants = false
            }
        },
        async setTenant (id) {
            if (this.currentTenant !== id.toString()) {
                // todo: set current tenant
                //
                //
                this.dropdown = false
                location.reload()
            }
        },
        isEmpty (obj) {
            for (let key in obj) {
                if (obj.hasOwnProperty(key)) { return false }
            }
            return true
        }
    }
}
</script>

<!-- para usar sass, tienes que instalar. luego lo revisas. Mientras lo haces, lo dejaremos en css -->
<style scoped lang="css">
.nav-profile {
    /* aqui una imagen de background, para mientras agregas el archivo al proyecto,...vamos a poner uno de una url*/
    background-image: url(https://2631.vitalpbx.org/stats/img/profile_background_image.8b814bb6.png);
    background-position: center;

}
</style>

