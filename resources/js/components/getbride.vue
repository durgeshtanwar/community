<template>
<div class="container">
    <div class="col-12">
        <div>
             <form class="form-horizontal" @submit.prevent="getbrides"> 
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
                <h3 class="card-title">Brides</h3>
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
                    <tr v-for="bride in brides.data" :key="bride.id">
                      <td>{{bride.name}}</td>
                      <td>{{bride.father_name}}</td>
                      <td>{{bride.mother_name}}</td>
                      <td>{{bride.gotra}}</td>
                      <td>{{bride.mobile}}</td>
                      <td>{{bride.city}}</td>
                      <td><img :src="'images/profile/'+bride.image" width="100px" ></td>
                     
                     
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
            <pagination :data="brides" v-show="this.mode==false" @pagination-change-page="getResults"></pagination>
            <pagination :data="brides" v-show="this.mode==true" @pagination-change-page="getbrides"></pagination>
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
           brides:{},
           form: new Form({
               city:'',
               name:'',
               gotra:''
           })
       }
   },
   methods: {
       loadbrides(){
           axios.get('api/loadbrides').then(({data})=>(this.brides = data));
       },
       getbrides(page = 1){
         this.mode = true;
           axios.get('api/getbrides?city='+this.form.city+'&name='+this.form.name+'&gotra='+this.form.gotra + '&page='+page).then(({data})=>(this.brides = data));
       },
       getResults(page = 1) {
         axios.get('api/loadbrides?page='+ page)
         .then(response => {this.brides = response.data});
       }
   },
   created(){
       this.loadbrides();
   } 
}
</script>