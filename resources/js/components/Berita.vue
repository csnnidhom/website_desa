<template>
    <div class="card">
        <div class="table table-responsive">
            <table class="table table-hover ">
                <thead class="text-center">
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Content</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                    
                    <tr v-for="item in Beritas" :key="item.message" class="text-center align-middle">
                        <td>no</td>
                        <td>{{item.image}}</td>
                        <td>{{item.title}}</td>
                        <td>{{item.content}}</td>
                        <td>{{item.id_category}}</td>
                        <td>{{item.status}}</td>
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
                Beritas:{},
            };
        },
        methods:{
            loadData(){
                axios.get('api/admin/berita').then (({data}) => (this.Beritas = data));
            }
        },
        created(){
            this.loadData();
        }
    }
</script>
