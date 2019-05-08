<template>
    <div>
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @click.prevent="addCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                    <has-error :form="form" field="cat_name"></has-error>
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      
    </div>
</template>

<script>
export default {
    name:"New",
    data(){
        return {
          form: new Form({
            cat_name: '',
          })
        }
    },
    methods:{
        addCategory(){
          this.form.post('/add-category')
          .then((response) => {
            this.$router.push('/category-list');
           Toast.fire({
              type: 'success',
              title: 'Category Added successfully'
            })
          })
          .catch(() =>{

          })
        }
    }
}
</script>