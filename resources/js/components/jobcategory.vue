<template>
<div class="container">
      <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Job Categories</h3>
                <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New Category
                        <i class="fas fa-user-plus"></i>
                    </button>
                </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Job Category</th>
                      <th>Description</th>
                     <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="category in categories" :key="category.id">
                      <td>{{category.id}}</td>
                      <td>{{category.job_category}}</td>
                      <td>{{category.description}}</td>
                      <td> 
                          <a href="#" class="mr-2"> <i class="fa fa-edit"></i></a>
                          <a href="#" @click="deletecategory(category.id)" class= "ml-2"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div><!-- /card -->

      </div>

    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Add New Job Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="createJobCategory">
      <div class="modal-body">
        <div class="form-group">
            <label class="col-form-label" for="job_category">Job Description </label>
        <input v-model="form.job_category" type="text" name="job_category" placeholder="Job Category" class="form-control" :class="{ 'is-invalid': form.errors.has('job_category') }">
      <has-error :form="form" field="job_category"></has-error>
    </div>
    
    <div class="form-group">
        <label class="col-form-label" for="address">Description </label>
       <textarea v-model="form.description" class="form-control" name="description" rows="3" placeholder="Enter ..." autocomplete="off" :class="{'is-invalid':form.errors.has('description')}"></textarea>
                  <has-error :form="form" field="description"></has-error>
       </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create New Job Category</button>
       <input type="button" class="button is-warning" @click="resetForm()" value="Reset Form">
      </div>
      </form>
    </div>
  </div> 
        
       
      
    </div><!-- /card -->
    </div>
 
</template>
<script>
export default {
    data(){
        return{
            categories:{},
            form:new Form({
                'job_category':'',
                'description':'',
            })
        }
    },
    methods :{
        createJobCategory(){
           this.$Progress.start();

           $('#addNew').modal('hide')
          if(this.form.post('api/createJobCategory')) {
               Toast.fire({
             type: 'success',
            title: 'Job Category Added Successfully'
              })

                this.$Progress.finish();
                 this.resetForm(); 
            }
     },
      resetForm() {
        console.log('Reseting the form')
        var self = this; //you need this because *this* will refer to Object.keys below`

        //Iterate through each object field, key is name of the object field`
        Object.keys(this.data.form).forEach(function(key,index) {
          self.data.form[key] = '';
        });
      },
        getcategory(){
            axios.get('api/getjobcategory').then(({data})=>this.categories = data.data);
        },
         deletecategory(id){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {

            // send   request to the server
            this.form.delete('api/removejobcategory/'+id).then(()=>{
               if (result.value) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
            }).catch(()=>{
              Swal.fire("failed:","There was something wrong.","warning")
            });
           
          })
        }

        },
        created(){
            this.getcategory();
        }

    }

</script>