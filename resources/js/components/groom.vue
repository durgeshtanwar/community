<template>
    <div class="container ">
      <div class="row">
        <div class="col-md-3 col-sm-12">
            
        </div> 
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Suryansh Sharma</h5>
                        <p class="card-text"><b>Father Name:</b> Keshav Shramra
                        <b>Mother Name:</b> Sunita Shramra
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                       <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                       <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                       <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/200x200">
                        <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                    </div>
                </div>
            </div>
        </div>  
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
        createUser() {
          this.form.post('api/user');
        }
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
