<template>
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url(/assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>My Account </h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><router-link :to="{name:'home'}"><i class="flaticon-home pe-2"></i>Home</router-link></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">My Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start My Account Page-->
        <section class="my-account-page pt-120 pb-120">
            <div class="container">
                <div v-if="isAuthenticated"
                    class="row wow fadeInUp animated">
                    <div class="col-xl-3 col-lg-4">
                        <div class="d-flex align-items-start">
                            <div class="nav my-account-page__menu flex-column nav-pills me-3" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                                    <span> Dashboard</span>
                                </button>
                                <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab"
                                    aria-controls="v-pills-orders" aria-selected="false"> <span> Orders</span> </button>
                                <button class="nav-link" id="v-pills-downloads-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-downloads" type="button" role="tab"
                                    aria-controls="v-pills-downloads" aria-selected="false"> <span> Downloads</span>
                                </button> <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-address" type="button" role="tab"
                                    aria-controls="v-pills-address" aria-selected="false"> <span> Address</span>
                                </button> <button class="nav-link" id="v-pills-account-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-account" type="button" role="tab"
                                    aria-controls="v-pills-account" aria-selected="false"> <span> Account Details</span>
                                </button>
                                <button class="nav-link" @click.prevent="logout">
                                    <span>Logout</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="tab-content " id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                                aria-labelledby="v-pills-dashboard-tab">
                                <div class="tabs-content__single">
                                    <h4>
                                        <span>Hello {{ user.name }} {{ user.surname }}</span>
                                    </h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <td>{{ user.id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ user.name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Surname</th>
                                                <td>{{ user.surname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ user.email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td>{{ user.age }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ user.address }}</td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td>{{ user.age }}</td>
                                            </tr>
                                            <tr>
                                                <th>Role</th>
                                                <td>{{ user.roleTitle }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
                                aria-labelledby="v-pills-orders-tab">
                                <div class="tabs-content__single">
                                    <h4><span>Orders</span></h4>
                                    <template v-if="user.orders.length>0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>ID</th>
                                                <th>Total price</th>
                                                <th>Payment status</th>
                                            </thead>
                                            <tbody>
                                                <tr v-for="userOrder in user.orders">
                                                    <th>{{ userOrder.id }}</th>
                                                    <td>{{ userOrder.total_price }}</td>
                                                    <td>{{ userOrder.payment_status }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </template>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-downloads" role="tabpanel"
                                aria-labelledby="v-pills-downloads-tab">
                                <div class="tabs-content__single">
                                    <h4><span>Hello Admin</span> (Not Admin? Logout)</h4>
                                    <h5>From your account dashboard you can view your <span>Recent Orders, manage your
                                            shipping</span> and <span>billing addresses,</span> and edit your
                                        <span>Password and account details</span></h5>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                                aria-labelledby="v-pills-address-tab">
                                <div class="tabs-content__single">
                                    <h4><span>Address</span></h4>
                                    <h5>{{ user.address }}</h5>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                                aria-labelledby="v-pills-account-tab">
                                <div class="tabs-content__single">
                                    <h4><span>Hello Admin</span> (Not Admin? Logout)</h4>
                                    <h5>From your account dashboard you can view your <span>Recent Orders, manage your
                                            shipping</span> and <span>billing addresses,</span> and edit your
                                        <span>Password and account details</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
    import AuthService from '@/services/AuthService'

    export default {
        name: "MyAccount",
        mounted(){
            this.getUserData();
        },
        data() {
            return {
                user:{

                },
                isLoading:false,
                isAuthenticated:false,
            };
        },
        methods: {
            getUserData() {
                this.isLoading = true;
                AuthService.getUserProfile().then((response)=>{
                    if(this.$store.getters.isAuthenticated){
                        this.user = response.data.user;
                        this.isAuthenticated = true;
                    }
                }).catch((error)=>{
                    this.$router.push({name:'auth.login',query:{redirect:window.location()}});
                }).finally(()=>{
                    this.isLoading = false;
                    $(document).trigger('changed');
                });
            },
            logout(){
                this.$store.dispatch('logout');
            },
        },
    };
</script>