<template>
    <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Job Dashboard</h1>
          </div><!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Add New Job</h3>
                <p>Add New Job vacancy.</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>              
              <router-link to="/addjob" class="small-box-footer">Click Here <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Job Category</h3>

                <p>Add or edit Job Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <router-link to="/addjobcategory" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Job Seekers</p>
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
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row mb-2">
           <div class="col-sm-12 col-md-6">
                <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Popular Job Category</h3>
               <div class="card-tools">
                   <router-link to="/addjobcategory" class="btn btn-success">View More    <i class="fas fa-user-plus"></i></router-link>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Job Category</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="category in categories" :key="category.id">
                      <td>{{category.job_category}}</td>
                      <td>{{category.description}}</td>
                    </tr>
                  
                  </tbody>
                </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              
             
              <!-- /.card-footer -->
            </div>
               
               </div> 
           
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return {
            categories:{}
        }
    },
    methods :{
        getcategory(){
            axios.get('api/getjobcategory').then(({data})=>this.categories = data.data);
        }
    },
    created(){
        this.getcategory();
    }
}
</script>