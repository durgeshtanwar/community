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
                <h3>{{count}}</h3>

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
                  <p class="mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ex dui, lobortis quis interdum non, condimentum vitae magna. Donec id quam eu mi molestie lobortis. Nunc mattis turpis ac ultricies luctus. In fringilla pretium nisl ac luctus. Maecenas condimentum gravida risus, at vestibulum ante iaculis in. Suspendisse et mattis nibh. In vestibulum auctor nunc, at euismod velit vestibulum a. Maecenas at felis id ex pretium accumsan pharetra non nisi. Phasellus faucibus malesuada urna vel vulputate. Aliquam dapibus neque ex, eget maximus ante viverra et. Vivamus id leo sagittis, porttitor lorem eget, hendrerit felis. Morbi ut efficitur leo. Nulla pellentesque, orci eu pulvinar gravida, diam urna dignissim ex, efficitur scelerisque nunc velit sed ligula. Sed interdum, turpis eget posuere bibendum, nunc libero volutpat tellus, quis elementum turpis sapien ut purus.

Praesent vestibulum erat a tristique luctus. Suspendisse potenti. Etiam tempus ultrices auctor. Proin venenatis, diam sit amet fermentum lacinia, lacus justo dignissim nisl, id ultrices velit libero sed leo. Donec fermentum sapien quis sapien porttitor condimentum. Integer aliquam nibh pharetra nunc fermentum, eget interdum orci faucibus. Donec malesuada tincidunt porttitor. Integer efficitur metus quis elementum consectetur. Aenean ultrices felis id sem fermentum, quis aliquam ex placerat. Ut sagittis turpis ac nisl lobortis tincidunt. Vestibulum eget condimentum sapien, a pulvinar leo. In varius lacus vitae magna venenatis vulputate. Integer at gravida sem. Sed tincidunt risus eros, malesuada hendrerit metus aliquam eget.
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
                  <img src="images/Training.png" class="img-fluid">

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
