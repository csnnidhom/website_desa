<template>
    <div class="card">
        <div class="table table-responsive">
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Video</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in Videos" :key="item.message" class="text-center align-middle">
                        <td>no</td>
                        <td>{{item.title}}</td>
                        <td>{{item.video}}</td>
                        <td>{{item.id_category}}</td>
                        <td>Edit | Hapus</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                Videos:{},
            };
        },
        methods:{
            loadData(){
                axios.get('api/admin/video').then (({data}) => (this.Videos = data));
            }
        },
        created(){
            this.loadData();
        }
    }
</script>