<template>
    <div class="container ">
        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New User
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gotra</th>
                      <th>Active</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>SHA-{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td><span class="tag tag-success">{{user.gotra}}</span></td>
                      <td><span class="tag tag-success">{{user.active}}</span></td>
                      <td> 
                          <a href="#"  class="mr-2"> <i class="fa fa-edit"></i></a>
                          <a href="#" @click="deleteuser(user.id)" class= "ml-2"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
            <pagination :data="news" @pagination-change-page="getResults"></pagination>
            </div>
            </div>
            <!-- /.card -->
                  </div>
    <!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="createUser">
      <div class="modal-body">
        <div class="form-group">
        <input v-model="form.name" type="text" name="name" placeholder=" Full Name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
      <has-error :form="form" field="name"></has-error>
    </div>

    <div class="form-group">
        <input v-model="form.family_cast" type="text" name="family_cast" placeholder=" Your Cast"
        class="form-control" :class="{ 'is-invalid': form.errors.has('family_cast') }">
      <has-error :form="form" field="family_cast"></has-error>
    </div>

    <div class="form-group">
        <input v-model="form.family_head" type="text" name="family_head" placeholder=" Your Family Head Name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('family_head') }">
      <has-error :form="form" field="family_head"></has-error>
    </div>
    
    <div class="form-group">
        <input v-model="form.email" type="email" name="email" placeholder="email address"
        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
      <has-error :form="form" field="email"></has-error>
    </div>
    <div class="form-group">
        <input v-model="form.mobile" type="text" name="mobile" placeholder="Mobile Number"
        class="form-control" :class="{ 'is-invalid': form.errors.has('mobile') }">
      <has-error :form="form" field="mobile"></has-error>
    </div>

       <div class="form-group">
       <select class="form-control" name="gotra" aria-placeholder="Gotra" v-model='form.gotra'>
         <option value="Select your Gotra" disabled selected>Select Your Gotra</option>
          <option value="Kuvera|Chamunda"> Kuvera</option>
          <option value="Mathuria|Sacchiay">Mathuria</option>
          <option value="Kataria|Chamunda">Kataria</option>
          <option value="Chaparwal|Chamunda">Chaparwal</option>
          <option value="Jangla|Sacchiay">Jangla</option>
          <option value="Mundhara|Mundhiyad">Mundhara</option>
          <option value="Baladh|Peeplaad">Baladh</option>
          <option value="Aasiwal|Chamunda">Aasiwal</option>
          <option value="Devera|Khinwaj">Devera</option>
          <option value="Lllad|Sacchiay">Lllad</option>
          <option value="Hatila|Chamunda">Hatila</option>
          <option value="Bhartani|Sacchiay">Bhartani</option>
          <option value="Sanvlera|Sacchiay">Sanvlera</option>
          <option value="Heergota|Chandi">Heergota</option>
          <option value="Bheenmaal|Madhyandini">Bheenmaal</option>
          <option value="Medatwal Aboti| Sacchiyay">Medatwal Aboti</option>

           </select>
       </div>
       

           <div class="form-group">
       <input v-model="form.password" type="password" name="password" placeholder="password"
            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
          <has-error :form="form" field="password"></has-error>
       </div>

       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create New User</button>
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
          news:{},
          form: new Form({
            name : '',
            email:'',
            family_cast:'',
            mobile:'',
            family_head:'',
            active:'',
            password:'',
            gotra:'', 
            usertype:'member'
          })
        }
      },
      methods: {
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
           
          })
        },  getResults(page = 1) {
          axios.get('api/user?page=' + page)
            .then(response => {
              this.news = response.data;
            });
		},
        loadUsers(){
         axios.get('api/user').then(({data})=>(this.users = data.data));
          
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
