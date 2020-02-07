<template>
    <div class="container ">

        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Job</h3>
                <div class="card-tools">
                    <button class="btn btn-success" @click="newModel">Add New Job
                    </button>
                </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Contact Number</th>
                      <th>Contact Person</th>
                      <th>City</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in news.data" :key="user.id">
                      <td>{{user.title}}</td>
                      <td>{{user.description}}</td>
                      <td>{{user.contact_number}} </td>
                    
                      <td>{{user.contact_person}}</td>
                      <td>{{user.city}}</td>
                      <td> 
                          <a href="#"  class="mr-2" @click="editModel(user)"> <i class="fa fa-edit"></i></a>
                          <a href="#" @click="deletenews(user.id)" class= "ml-2"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
            <pagination :data="news" @pagination-change-page="getResults"></pagination>
            </div>
            <!-- /.card -->
                  </div>
    <!-- Modal -->
       

  <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Job</h5>
        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form class="form-horizontal" @submit.prevent="editmode ? updateUser(): addtodirectory()" id="form-directory">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                     <input v-model="form.title" type="text" name="title"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                         <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                     <textarea v-model="form.description" type="text" name="description"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                         <has-error :form="form" field="description"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                     <input v-model="form.city" type="text" name="city"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                         <has-error :form="form" field="city"></has-error>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Contact Person</label>
                    <div class="col-sm-10">
                     <input v-model="form.contact_person" type="text" name="contact_person"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('contact_person') }">
                         <has-error :form="form" field="contact_person"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-10">
                     <input v-model="form.contact_number" type="text" name="contact_number"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('contact_number') }">
                         <has-error :form="form" field="contact_number"></has-error>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
      
    </div>
  </div> 
</div> 
    </div>
</template>

<script>
    export default {
      data() {
        return {
          editmode:false,
           news:{},
            form: new Form ({
             id:'',
             title : '',
            description:'',
            city:'',
            contact_person:'',
            contact_number:'',

      })
        }
      },
      methods: {
        newModel(){
          this.editmode=false;
          this.form.reset();
        $('#addNew').modal('show');
        },
        
        // Edit mode for the user 
         editModel(user){
           this.editmode = true;
          this.form.reset();
        $('#addNew').modal('show');
        this.form.fill(user);
        },

        updateUser(){
       this.form.put('api/updatejob/'+ this.form.id)
       .then(()=>{
         // success
         $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
               
         
       })
       .catch(()=>{
          this.$Progress.fail();
       })

       this.$Progress.finish();


        },
        

        deletenews(id){
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
            this.form.delete('api/deletejob/'+id).then(()=>{
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
        },
        getResults(page = 1) {
          axios.get('api/myjobs?page=' + page)
            .then(response => {
              this.news = response.data;
            });
		},
        addtodirectory(event) {
          this.$Progress.start();
          this.form.post('api/job').then(()=>{
              Toast.fire({
             type: 'success',
            title: 'New Job Inserted Successfully'
              })

          });
        //  document.getElementById("form-directory").reset();
         console.log('durgesh');
          // document.getElementsByName('name').value = '';
        
        this.form.reset();
            // this.form.name = "";
            // this.form.profession ="";
            // this.form.address="";
            // this.for
            // this.form.city = "";
            // this.form.state = "";

         
         
          this.$Progress.finish();
         
        //  this.name = '';
          // $('#addNew').modal('hide');
        },
        loadnews(){
           axios.get('api/myjobs').then(({data})=>(this.news = data));
        }
      },
        created() {
          this.loadnews();
        },
        mounted(){
          console.log(
            "this. is mounted"
          )
        }
    }
</script>
