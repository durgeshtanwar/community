<template>
<div class="container">
    <div class="col-12">
        <div>
             <form class="form-horizontal" @submit.prevent="getmembers"> 
                   <div class="row mt-3">  
                    
                     <div class="col-md-3">
                     <div class="form-group">  
                       <input v-model="form.name" type="text" name="name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="search by name">
                         <has-error :form="form" field="name" ></has-error>     
                     </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                         <input v-model="form.gotra" type="text" name="gotra"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('gotra') }" placeholder="search by gotra">
                         <has-error :form="form" field="gotra" ></has-error>     
                     </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form group">
                         <input v-model="form.occupation" type="text" name="occupation"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('occupation') }" placeholder="search by occupation">
                         <has-error :form="form" field="occupation"  ></has-error>   
                     </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form group">
                         <input v-model="form.department" type="text" name="department"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('department') }" placeholder="search by department">
                         <has-error :form="form" field="department"  ></has-error>   
                     </div>
                     </div>
                    
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form group">
                            <input v-model="form.state" type="text" name="state"
                              class="form-control" :class="{ 'is-invalid': form.errors.has('state') }" placeholder="search by state">
                            <has-error :form="form" field="state"  ></has-error>   
                        </div>
                        </div>
                          <div class="col-md-3">
                            <div class="form group">
                            <input v-model="form.city" type="text" name="city"
                              class="form-control" :class="{ 'is-invalid': form.errors.has('city') }" placeholder="search by city">
                            <has-error :form="form" field="city"  ></has-error>   
                        </div>
                        </div>
                           <div class="col-md-3">
                         <div class="form-group">
                        <button class="btn btn-success">Submit</button>  
                        </div>
                     </div>
                     </div>
                 </form>
                 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Directory</h3>
                <div class="card-tools">
            </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
               <div class="row">
                
               </div>
               
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Occupation</th>
                      <th>department</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Mobile Number</th>
                      <th>Gotra</th>
                                       
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="member in members.data" :key="member.id">
                      <td>{{member.name}}</td>
                      <td>{{member.occupation}}</td>
                      <td>{{member.department}}</td>
                      <td>{{member.city}}</td>
                      <td>{{member.state}}</td>
                      <td>{{member.mobile}}</td>
                      <td>{{member.gotra}}</td>
                     
                     
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
            <pagination :data="members" @pagination-change-page="getResults"></pagination>
            </div>
            </div>
            <!-- /.card -->
                  </div>
    </div>


</div>
</template>
<script>
export default {
   data() {
       return {
           members:{},
           form: new Form({
              name: '',
              occupation:'',
              department:'',
              city:'',
              state:'',
              gotra:''
           })
       }
   },
   methods: {
       loadmembers(){
           axios.get('api/loadmembers').then(({data})=>(this.members = data));
       },
       getmembers(){
           axios.get('api/getmembers?city='+this.form.city+'&name='+this.form.name+'&gotra='+this.form.gotra +'&state='+this.form.state + '&occupation='+this.form.occupation + '&department='+this.form.department).then(({data})=>(this.members = data));
       },
        getResults(page = 1) {
         axios.get('api/loadmembers?page='+ page)
         .then(response => {this.members = response.data});
       }
   },
   created(){
       this.loadmembers();
   } 
}
</script>