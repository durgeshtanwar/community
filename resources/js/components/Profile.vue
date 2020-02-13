<template>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-4">
             <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid " :src="'images/profile/'+users.image" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{users.name}}</h3>

              

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Membership No.</b> <b class="float-right">SHA-{{users.id}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Age</b> <b class="float-right">{{familydata[0].dob | getAge}} years</b>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <b class="float-right">{{familydata[0].marriage_status}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Blood Group</b> <b class="float-right">{{familydata[0].blood_group}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Gotra</b> <b class="float-right">{{users.gotra}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Kuldevi</b> <b class="float-right">{{users.kuldevi}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <b class="float-right">{{users.gender}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right">{{users.mobile}}</a>
                  </li>
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="col-md-6">
              <div class="card card-primary card-outline">
                <div class="card-body">
                 <strong><i class="fas fa-book mr-1"></i> Occupation</strong>
                <p class="text-muted">
                 {{familydata[0].occupation}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">{{familydata[0].address}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> City</strong>

                <p class="text-muted">
                 {{familydata[0].city}}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
            </div>
            <!-- Family details -->
             <div class="card card-primary card-outline">
                <div class="card-body">
                 <strong><i class="fas fa-book mr-1"></i> Family Details</strong>
                <p class="text-muted">
                 Father Name :{{familydata[0].father_name}} <br>
                 Mother Name : {{familydata[0].mother_name}}
                
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Murlidhar Vyas Nagar Bikaner</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
          users:{},
          familydata:{},
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
            axios.get('api/familylist').then(({data})=>(this.familydata = data));
             axios.get('api/userDetails').then(({data})=>(this.users=data));
         }
        },
        createUser() {
          this.$Progress.start();
          this.form.post('api/user');
          Toast.fire({
             type: 'success',
            title: 'User created successfully'
              })

          this.$Progress.finish();
        },
        getProfilePhoto(){
          return "images/profile"+this.users.image;
        },
      
        created() {
           this.loadUsers();
        },
        mounted(){
          console.log(
            "this. is mounted"
          )
          console.log(this.familydata);
        }
    }
</script>
