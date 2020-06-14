<template>
<div class="container">
    <div class="col-12">
        <div>
             <form class="form-horizontal" @submit.prevent="getgrooms"> 
                   <div class="row mt-3">  
                    
                     <div class="col-md-3">
                     <div class="form-group">  
                       <label>Present Year</label> 
                       <select class="form-control" v-model="form.present_year">
                           <option value="2020">2020</option> 
                       </select>
                     </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                            <label> Education </label>
                         <select name="education" id="" v-model="form.education" class="form-control">
                        <option value="post graduate">Post Graduate</option>
                        <option value="graduate">Graduate</option>
                        <option value="12th">12th</option>
                        <option value="11th">11th</option>
                        <option value="10th">10th</option>
                        <option value="9th">9th</option>
                        <option value="8th">8th</option>
                        <option value="7th">7th</option>
                        <option value="6th">6th</option>
                        <option value="5th">5th</option>
                        <option value="4th">4th</option>
                        <option value="3rd">3rd</option>
                        <option value="2nd">2nd</option>
                        <option value="1st">1st</option>
                        <option value="LKG/UKG">LKG/UKG</option>
                      </select>
                     </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form group">
                           <label>City</label>
                         <input v-model="form.city" type="text" name="city"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('city') }" placeholder="search by city">
                         <has-error :form="form" field="city"  ></has-error>   
                     </div>
                     </div>
                     <div class="col-md-3">
                        
                       <div class="form-group">
                        <label>Percentage Range</label>
                           <select class="form-control" v-model="form.percentage_range">
                           <option value=85>85</option>
                           <option value=75>75</option> 
                           <option value=65>65</option>
                       </select>
                       </div>
                     </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                          <div class="form-group">
                        <button class="btn btn-success">Submit</button>  
                        </div>

                         </div>
                     </div>
                 </form>
                 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Result</h3>
                <div class="card-tools">
            </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
               <div class="row">
                
               </div>
               
                <table class="table table-hover" id="printTable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Education</th>
                      <th>Percentage</th>
                      <th>Contact Number</th>
                      <th>State</th>
                      <th>City</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="groom in result.data" :key="groom.id">
                      <td>{{groom.name}}</td>
                      <td>{{groom.education}}</td>
                      <td>{{groom.percentage}}</td>
                      <td>{{groom.mobile}}</td>
                      <td>{{groom.state}}</td>
                      <td>{{groom.city}}</td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
             <pagination :data="result" @pagination-change-page="getgrooms"></pagination>
             <button class="btn btn-success" v-print="printObj">Print</button>
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
            printObj: {
              id: "printTable",
              popTitle: 'Shakdwipiya Pariwar Users Admin Area',
              extraCss: 'https://www.google.com,https://www.google.com',
             
            },
           result:{},
           form: new Form({
               city:'',
               name:'',
               education:'',
               present_year:'',
               percentage_range:'',
           })
       }
   },
   methods: {
      
       getgrooms(page = 1){
         this.mode = true;
           axios.get('api/getacademic?education='+this.form.education+'&present_year='+this.form.present_year +'&percentage_range='+this.form.percentage_range +'&page='+page).then(({data})=>(this.result = data));
       },
       
   },
   created(){
    //    this.loadgrooms();
   } 
}
</script>