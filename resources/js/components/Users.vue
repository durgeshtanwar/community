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
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>SHA-{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td><span class="tag tag-success">{{user.gotra}}</span></td>
                      <td> 
                          <a href="#" class="mr-2"> <i class="fa fa-edit"></i></a>
                          <a href="#" class= "ml-2"><i class="fa fa-trash red"></i></a>
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
        <input v-model="form.email" type="email" name="email" placeholder="email address"
        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
      <has-error :form="form" field="email"></has-error>
    </div>

      <div class="form-group">
       <input v-model="form.username" type="text" name="username" placeholder="username"
            class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">
          <has-error :form="form" field="username"></has-error>
       </div>

        <div class="form-group">
       <input v-model="form.gotra" type="text" name="gotra" placeholder="gotra"
            class="form-control" :class="{ 'is-invalid': form.errors.has('gotra') }">
          <has-error :form="form" field="gotra"></has-error>
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
          form: new Form({
            name : '',
            email:'',
            username:'',
            password:'',
            gotra:'',
            usertype:'member'
          })
        }
      },
      methods: {
        loadUsers(){
         axios.get('api/user').then(({data})=>(this.users = data.data));
          
        },
        createUser() {
          this.$Progress.start();
          this.form.post('api/user');
          Toast.fire({
             type: 'success',
            title: 'User created successfully'
              })

          this.$Progress.finish();
        }
      },
        created() {
           this.loadUsers();
        },
        mounted(){
          console.log(
            "this. is mounted"
          )
        }
    }
</script>
