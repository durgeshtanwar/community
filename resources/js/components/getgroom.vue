<template>
<div class="container">
    <div class="col-12">
        <div>
             <form class="form-horizontal" @submit.prevent="getgrooms"> 
                   <div class="row mt-3">  
                    
                     <div class="col-3">
                     <div class="form-group">  
                       <input v-model="form.name" type="text" name="name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="search by name">
                         <has-error :form="form" field="name" ></has-error>     
                     </div>
                     </div>

                     <div class="col-3">
                        <div class="form-group">
                         <input v-model="form.gotra" type="text" name="gotra"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('gotra') }" placeholder="search by gotra">
                         <has-error :form="form" field="gotra" ></has-error>     
                     </div>
                     </div>
                     <div class="col-3">
                        <div class="form group">
                         <input v-model="form.city" type="text" name="city"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('city') }" placeholder="search by city">
                         <has-error :form="form" field="city"  ></has-error>   
                     </div>
                     </div>
                     <div class="col-3">
                         <div class="form-group">
                        <button class="btn btn-success">Submit</button>  
                        </div>
                     </div>
                     </div>
                 </form>
                 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grooms</h3>
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
                      <th>Father Name</th>
                      <th>Mother Name</th>
                      <th>Gotra</th>
                      <th>Contact Number</th>
                      <th>City</th>
                      <th>Photo</th>
                                       
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="groom in grooms" :key="groom.id">
                      <td>{{groom.name}}</td>
                      <td>{{groom.father_name}}</td>
                      <td>{{groom.mother_name}}</td>
                      <td>{{groom.gotra}}</td>
                      <td>{{groom.mobile}}</td>
                      <td>{{groom.city}}</td>
                      <td><img :src="'images/profile/'+groom.image" width="100px" ></td>
                     
                     
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
            <!-- <pagination :data="news" @pagination-change-page="getResults"></pagination> -->
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
           grooms:{},
           form: new Form({
               city:'',
               name:'',
               gotra:''
           })
       }
   },
   methods: {
       loadgrooms(){
           axios.get('api/loadgrooms').then(({data})=>(this.grooms = data.data));
       },
       getgrooms(){
           axios.get('api/getgrooms?city='+this.form.city+'&name='+this.form.name+'&gotra='+this.form.gotra).then(({data})=>(this.grooms = data.data));
       }
   },
   created(){
       this.loadgrooms();
   } 
}
</script>