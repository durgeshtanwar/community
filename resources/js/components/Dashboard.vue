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
                <h3>{{familydata.username}}<sup style="font-size: 20px"></sup></h3>

                <p>Your ID</p>
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
                 Total Users <h3>{{count}}</h3>
               Family Members <h3>{{family.length}}</h3>

                <p></p>
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
                 <div class="card-tools">
                  Contact 9784902072 for more information
                </div>
                </div>
               
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="/images/suryabhagwan.jpeg" alt="First slide">
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
                      <img class="img-fluid mt-2" src="/images/ad.png">
                  <p class="mt-2">
                    
                        * ॐ सूर्याय नम: ।
                        * ॐ भास्कराय नम:।
                        * ऊं रवये नम: ।
                        * ऊं मित्राय नम: ।
                        * ॐ भानवे नम:
                        * ॐ खगय नम: ।
                        * ॐ पुष्णे नम: ।
                        * ॐ मारिचाये नम: ।
                        * ॐ आदित्याय नम: ।
                        * ॐ सावित्रे नम: ।
                        * ॐ आर्काय नम: ।
                        * ॐ हिरण्यगर्भाय नम: ।

                  </p>
                  
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                   <div id="news">
                    <h2 class="text-center">News</h2>
                <ul class="list-group"  v-for="ns in news" :key="ns.id">
                <li class="list-group-item ">  {{ns.news_title}}</li>
               
               </ul> 
               <hr>
                </div>
                <div id="events">
                  <h2 class="text-center">Events</h2>
                  <ul class="list-group"  v-for="event in events" :key="event.id">
                <li class="list-group-item ">  {{event.event_name}}</li>
                </ul>
                      </div>   

                      <p class="text-center"><strong>Advertisement</strong></p>
                  <img src="images/ad.jpeg" class="img-fluid">

                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
               
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
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
          count:'',
          familydata:{},
          allusers:{},
          news:{},
          family:{},
          events:{},
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
            axios.get('api/usercounts').then(({data})=>(this.count=data));
            axios.get('api/getEvents').then(({data})=>(this.events=data.data));
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
