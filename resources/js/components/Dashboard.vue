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
                <h3>{{family.length}}<sup style="font-size: 20px"></sup></h3>

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
        <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h5 class="card-title"> Welcome to Shakdwipiya Samaj</h5>

                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
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
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <h2 class="text-center display-4">News</h2>
                <ul class="list-group"  v-for="ns in news" :key="ns.id">
                <li class="list-group-item marquee">  {{ns.news_title}}</li>
                
               </ul>    
                              
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
          
          </div>  


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
      components: { carousel },
      data() {
        return {
          users:{},
          familydata:{},
          allusers:{},
          news:{},
          family:{},
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
            axios.get('api/familyuserlist').then(({data})=>(this.family=data));
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
