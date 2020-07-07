<template>
<div class="container"> 
  <div  v-show="usertype !='admin'">
  <h2> You are not Authorized to view this page....</h2>
  <router-link to="/dashboard"> Go to dashboard</router-link></div>
 <div  v-show="usertype =='admin'">
  <div class="row">
    <div class="col-md-12 mt-3">
    <div class="callout callout-success">
                  <h5>This is settings</h5>

                  <p>Welcome to the settings of Shakdwipiya Pariwar.</p>
                </div>
  </div>
  </div>
  <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-address-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Directory</span>
                <span class="info-box-number">{{dcount}} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Events</span>
                <span class="info-box-number">{{eventcount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-user-friends"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Matrimonial Counts</span>
                <span class="info-box-number"> Number of Grooms - {{groomcount}}</span>
                <span class="info-box-number"> Number of Brides - {{bridecount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Families</span>
                <span class="info-box-number">{{familycount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-md-3">
          <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fas fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Directory</span>
                <!-- <span class="info-box-number"><router-link class="text-white" to="/addtodirectory">Manage Directory</router-link></span> -->
                
                
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>
        <div class="col-md-3">
          <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Events</span>
                <span class="info-box-number"><router-link class="text-dark" to="/editevents">Manage Events</router-link></span>
                
                
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>
            <div class="col-md-3">
          <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number"><router-link class="text-white" to="/users">Users Management</router-link></span>
                
                
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>
              <div class="col-md-3">
                <div class="info-box bg-info">
                  <span class="info-box-icon"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">News</span>
                    <span class="info-box-number"><router-link class="text-white" to="/insertnews">News Management</router-link></span>
                                
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>

        </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-success">
                <div class="widget-user-image">
                  <img class="img-circle" src="/images/job.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Jobs Portfolio</h3>
                <h5 class="widget-user-desc"><router-link to='/jobapplicants' class="text-white"> Manage Jobs</router-link></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Total Jobs Posted <span class="float-right badge bg-primary">{{jobsCount}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Total Applicants <span class="float-right badge bg-info">{{applicantsCount}}</span>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </div>
      </div>
      <div class="col-md-6">
        <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-success">
                <div class="widget-user-image">
                  <img class="img-circle" src="/images/job.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Academic</h3>
                <h5 class="widget-user-desc"><router-link to='/academic' class="text-white"> Manage Students</router-link></h5>
              </div>
             
            </div>
      </div>

    </div>
        
</div>
</div>
</template>
<script>
export default {
    data(){
      return {
        usertype:'',
        dcount :'', 
        eventcount:'',
        groomcount:'',
        bridecount:'',
        familycount:'',
        jobsCount:'',
        applicantsCount:''
      }
    },
    methods: {
     loadUsers(){

          axios.get('api/getusertype').then(({data})=>this.usertype=data);
           axios.get('api/directorycounts').then(({data})=>(this.dcount=data));
           axios.get('api/eventcounts').then(({data})=>(this.eventcount=data));
           axios.get('api/groomcount').then(({data})=>(this.groomcount=data));
           axios.get('api/bridecount').then(({data})=>(this.bridecount=data));
           axios.get('api/familycount').then(({data})=>(this.familycount=data));
           axios.get('api/jobsCount').then(({data})=>(this.jobsCount=data));
           axios.get('api/jobApplicantsCount').then(({data})=>(this.applicantsCount=data));
           
           }
        },
        created() {
        this.loadUsers()
        }
    }

</script>