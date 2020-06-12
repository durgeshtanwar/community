<template>
<div class="container">
    <div class="col-12">
        <div>
             <form class="form-horizontal" @submit.prevent="getgrooms"> 
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
                          <select class="form-control" name="gotra" aria-placeholder="Gotra" v-model='form.gotra'>
                                    <option value=" "> Not Applicable</option>
                                    <option value="Kuvera"> Kuvera</option>
                                    <option value="Mathuria">Mathuria</option>
                                    <option value="Kataria">Kataria</option>
                                    <option value="Chaparwal">Chaparwal</option>
                                    <option value="Jangla">Jangla</option>
                                    <option value="Mundhara">Mundhara</option>
                                    <option value="Baladh">Baladh</option>
                                    <option value="Aasiwal">Aasiwal</option>
                                    <option value="Devera">Devera</option>
                                    <option value="Lllad">Lllad</option>
                                    <option value="Hatila">Hatila</option>
                                    <option value="Bhartani">Bhartani</option>
                                    <option value="Sanvlera">Sanvlera</option>
                                    <option value="Heergota">Heergota</option>
                                    <option value="Bheenmaal">Bheenmaal</option>
                                    <option value="Medatwal Aboti">Medatwal Aboti</option>
                                </select>      
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
                    <tr v-for="groom in grooms.data" :key="groom.id">
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
            <pagination v-show="this.mode==false" :data="grooms" @pagination-change-page="getResults"></pagination>
            <pagination v-show="this.mode==true" :data="grooms" @pagination-change-page="getgrooms"></pagination>
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
          mode:false,
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
           axios.get('api/loadgrooms').then(({data})=>(this.grooms = data));
       },
       getgrooms(page = 1){
         this.mode = true;
           axios.get('api/getgrooms?city='+this.form.city+'&name='+this.form.name+'&gotra='+this.form.gotra +'&page='+page).then(({data})=>(this.grooms = data));
       },
       getResults(page = 1) {
         axios.get('api/loadgrooms?page='+ page)
         .then(response => {this.brides = response.data});
       }
   },
   created(){
       this.loadgrooms();
   } 
}
</script>