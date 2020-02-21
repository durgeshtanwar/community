<template>
    <div class="container ">
        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Family Members</h3>
                <div class="card-tools">
                    <router-link class="btn btn-success" to='/addFamily'>Add New User
                        <i class="fas fa-user-plus"></i>
                    </router-link>
                </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gotra</th>
                      <th>usertype</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>SHA-{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td><span class="tag tag-success">{{user.gotra}}</span></td>
                      <td><span class="tag tag-success">{{user.usertype}}</span></td>
                      <td> 
                          <a href="#"  class="mr-2" @click="editModel(user)"> <i class="fa fa-edit"></i></a>
                          <a href="#" v-if="user.id!=authuser" @click="deleteuser(user.id)" class= "ml-2"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                  </div>
    <!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Update Memer Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="updateUser()">
      <div class="modal-body">
        <div class="form-group">
        <input v-model="form.name" type="text" name="name" placeholder=" Full Name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
      <has-error :form="form" field="name"></has-error>
    </div>
        <div class="form-group">
        <select v-model="form.usertype" class="form-control" name="usertype" aria-placeholder="Gotra">
          <option value="family">Family</option>
          <option value="member">Member</option>
         
          </select>
          <has-error :form="form" field="usertype"></has-error>

       </div>

    
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Change User Type
        </button>
      </div>
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
          users:{},
          authuser :'',
          editmode:false,
          form: new Form({
            id:'',
            name : '',
            usertype:''
          })
        }
      },
      methods: {
         editModel(user){
           this.editmode = true;
          this.form.reset();
        $('#addNew').modal('show');
        this.form.fill(user);
        },
        deleteuser(id){
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
            if(this.authuser === id){
               Swal.fire("failed:","you can not delete yourself","warning");
            }else{
               this.form.delete('api/user/'+id).then(()=>{
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
            }
           
           
          })
        }, 
        loadUsers(){
         axios.get('api/familyuserlist').then(({data})=>(this.users = data));
         axios.get('api/getAuthenticatedUser').then(({data})=>(this.authuser = data));
          
        },
        createUser() {
          this.$Progress.start();
          this.form.post('api/user').then(()=>{
           Toast.fire({
            type: 'success',
            title: 'User created successfully' })
            $('#addNew').modal('hide');
          })

      
          // Toast.fire({
          //    type: 'success',
          //   title: 'User created successfully'
          //     })

          this.$Progress.finish();
        },
        updateUser(){
          this.$Progress.start();
         this.form.put('api/updateUserType/'+this.form.id)
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
        }
      },
        created() {
           this.loadUsers();
           setInterval((()=>this.loadUsers(),3000));
        },
        mounted(){
          console.log(
            "this. is mounted"
          )
        }
    }
</script>
