<template>
    <div class="container ">
        <div class="col-12 mt-5">
            <h1>Search Bride</h1>
           <div class="card teal">
              <div class="card-header">
                <h3 class="card-title">Bride Search</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Father's Name</th>
                      <th>Mother's Name</th>
                      <th>City</th>
                      <th>Contact Details</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>SHA-183</td>
                      <td>Varsha </td>
                      <td>RK Sharma</td>
                      <td>Madhu Sharma</td>
                      <td>Bikaner</td>
                      <td>9414264747</td>
                      <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#addNew">View Profile</button></td>
                    </tr>
                    <tr>
                       <td>SHA-183</td>
                      <td>Varsha </td>
                      <td>RK Sharma</td>
                      <td>Madhu Sharma</td>
                      <td>Bikaner</td>
                      <td>9414264747</td>
                      <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#addNew">View Profile</button></td>
                    </tr>
                    <tr>
                       <td>SHA-183</td>
                      <td>Varsha </td>
                      <td>RK Sharma</td>
                      <td>Madhu Sharma</td>
                      <td>Bikaner</td>
                      <td>9414264747</td>
                      <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#addNew">View Profile</button></td>
                    </tr>
                    <tr>
                      <td>SHA-183</td>
                      <td>Varsha </td>
                      <td>RK Sharma</td>
                      <td>Madhu Sharma</td>
                      <td>Bikaner</td>
                      <td>9414264747</td>
                      <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#addNew">View Profile</button></td>
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
        <h5 class="modal-title" id="addNewLabel">Profile of the user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="/images/profile.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Suryansh Sharma</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Membership No.</b> <a class="float-right">SHA-123</a>
                  </li>
                  <li class="list-group-item">
                    <b>Age</b> <a class="float-right">22 years</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right">Engaged</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gotra</b> <a class="float-right">Mundhara</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">Male</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right">8949163900</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create New User</button>
      </div>
     
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
