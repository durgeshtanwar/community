<template>
    <div class="container ">
        <h1>Dashboard</h1>
        <div class="row ">
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Welcome! </h3>

                <h6>{{familydata.name}}</h6>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{users.length}}<sup style="font-size: 20px"></sup></h3>

                <p>Family Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{allusers.length}}</h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{familydata.code}}</h3>

                <p>Unique Invitation Code</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://pmdvod.nationalgeographic.com/NG_Video/926/90/lgpost_1518055506936.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://pmdvod.nationalgeographic.com/NG_Video/926/90/lgpost_1518055506936.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://pmdvod.nationalgeographic.com/NG_Video/926/90/lgpost_1518055506936.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


        <div class="row">
        <div class="col-4">
        <div class="card-body p-0">
                <table class="table table-striped table-valign-middle" style="height:10em">
                  <thead>
                  <tr>
                    <th>News</th>
                  </tr>
                  </thead>
                  <tbody>
                   <tr v-for="ns in news" :key="ns.id">
                    <td>
                      {{ns.news_title}}
                    </td>
                   </tr>
                  </tbody>
                </table>
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
          allusers:{},
          news:{},
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
            axios.get('api/familylist').then(({data})=>(this.users = data));
             axios.get('api/userDetails').then(({data})=>(this.familydata=data));
             axios.get('api/user').then(({data})=>(this.allusers = data.data));
            axios.get('api/getnews').then(({data})=>(this.news = data.data));
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
      
        created() {
           this.loadUsers();
        },
        mounted(){
          console.log(
           this.news
          )
        }
    }
</script>
