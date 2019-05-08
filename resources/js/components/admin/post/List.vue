<template>
    <div>
      
      <div class="card">
      <div class="card-header">
              <h3 class="card-title">Post List</h3>
              <div class="card-tools">
                 
                      <router-link to="/add-post">
                            <button class="btn btn-primary">
                                Add Post
                              </button>
                      </router-link>
                
              </div>
        </div>
      <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SI</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">User</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Category</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Title</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Photo</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action</th>
                </tr>
                </thead>
                <tbody>
            
                
                
                <tr role="row" class="odd" v-for="(post,index) in getallPosts">
                  <td class="sorting_1">{{index+1}}</td>
                  <td v-if="post.user">{{post.user.name}}</td>
                  <td v-else>null</td>
                  <td v-if="post.category">{{post.category.cat_name}}</td>
                  <td v-else>null</td>
                  <td>{{post.title}}</td>
                  <td>{{post.description |shortlength(40,'...')}}</td>
                  <td><img :src="Ourimage(post.photo)" width="40" height="50"> </td>
                  <td>
                     <router-link :to="`edit-post/${post.id}`">Edit</router-link>
                     <a href="" @click.prevent = "deletePost(post.id)">Delete</a>
                  </td>
                  
                </tr>
                </tbody>
               
              </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
            </div>
    </div>
</template>

<script> 
    export default {
        name: "List",
        mounted(){
            this.$store.dispatch("getAllPost")
        },
        computed:{
            getallPosts(){
                    return this.$store.getters.getAllPost
                }
            
        },
        methods:{
            Ourimage(image){
              return "uploadimage/"+image;
            },
            deletePost(id){
              axios.get('/delete/'+id)
                .then(()=>{
                  this.$store.dispatch("getAllPost")
                  Toast.fire({
                      type: 'success',
                      title: 'Post Delete successfully'
                    })
                })
            }
         }
}
</script>

<style> 

</style>