<template>
<div class="container">
    <div class="col-12">
        <div>
           <button class="btn btn-success btn-block mb-2 mt-2 d-lg-none" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Search <i class="fa fa-search" aria-hidden="true"></i>
  </button>
             <form class="form-horizontal collapse dont-collapse-sm" @submit.prevent="getmembers" id="collapseExample"> 
                   <div class="row mt-3">  
                    
                     <div class="col-md-3">
                     <div class="form-group">  
                       <label> Name </label>
                       <input v-model="form.name" type="text" name="name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="search by name">
                         <has-error :form="form" field="name" ></has-error>     
                     </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                          <label> Gotra </label>
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
                          <label for="">Occupation</label>
                         <select v-model="form.occupation" class="form-control" name="occupation" :class="{'is-invalid':form.errors.has('occupation')}">
                          <option value="Govt">Government Job</option>
                          <option value="private">Private Job</option>
                          <option value="self employed">Self Employed</option>
                          <option value="student">Student</option>
                          <option value="unemployed">Unemployed</option>
                          <option value="retired">Retired</option>
                          <option value="house wife">House wife</option>
                        </select>
                        <has-error :form="form" field="occupation" ></has-error> 
                     </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form group">
                          <label v-if="form.occupation=='private' || form.occupation=='Govt' || form.occupation=='self employed'">Department</label>
                        <select v-if ="form.occupation == 'private' || form.occupation=='self employed'" v-model="form.department"   class="form-control">
                        <option>Accounts/ Banking / Finance / Tax</option>
                        <option>Accountant</option>
                        <option>Debt Recovery Agent</option>
                        <option>Equity Dealer</option>
                        <option>Financial Planner</option>
                        <option>Insurance Agent</option>
                        <option>Mutual Fund Agent</option>
                        <option>Analytics</option>
                        <option>Analytics / Business Intelligence / Data Science</option>
                        <option>Back Office Operations</option>
                        <option>Admin Executive</option>
                        <option>Back Office</option>
                        <option>Claims Processing Executive</option>
                        <option>Data Entry</option>
                        <option>Helper</option>
                        <option>Human Resource (HR)</option>
                        <option>MIS Executive</option>
                        <option>Office Assistant</option>
                        <option>Office Boy</option>
                        <option>Personal Assistant</option>
                        <option>Stenographer</option>
                        <option>Business Operations</option>
                        <option>BPO</option>
                        <option>Data Collection Executive</option>
                        <option>Operations Executive</option>
                        <option>Design</option>
                        <option>Architecture</option>
                        <option>Draftsman</option>
                        <option>DTP Operator</option>
                        <option>Fashion Designer</option>
                        <option>Web / Graphic Design</option>
                        <option>Front Desk Operations</option>
                        <option>Cashier</option>
                        <option>Customer Care</option>
                        <option>Public Relations (PR) Executive</option>
                        <option>Receptionist/Front Desk</option>
                        <option>Store Keeper</option>
                        <option>Hospitality</option>
                        <option>Air Hostess</option>
                        <option>Bartender</option>
                        <option>Cabin Crew</option>
                        <option>Cook / Chef</option>
                        <option>Waiter / Steward</option>
                        <option>IT - Hardware &amp; Software</option>
                        <option>Android Developer</option>
                        <option>Application Programming / Maintenance / Architecture</option>
                        <option>Database Administrator</option><option>IT Software - ERP / CRM</option>
                        <option>IT Software - Frontend / Backend</option>
                        <option>IT Software - Mobile Development</option>
                        <option>IT Support - Hardware</option>
                        <option>Network / Security / System Administration</option>
                        <option>Product / Project Management</option>
                        <option>Software Developer</option>
                        <option>Software Testing / QA</option>
                        <option>Logistics / Supply Chain</option>
                        <option>Delivery Boy</option>
                        <option>Labourer</option>
                        <option>Loader</option>
                        <option>Merchandiser</option>
                        <option>Manufacturing</option>
                        <option>Machine Operator</option>
                        <option>Packer</option>
                        <option>Pujari</option>
                        <option>Production/ Quality Control/ Maintenance</option>
                        <option>Purchase / Procurement Executive</option>
                        <option>Marketing</option><option>Content Writer</option>
                        <option>Digital Marketing Expert</option>
                        <option>Marketing Executive</option>
                        <option>Non-IT Engineering</option>
                        <option>Aeronautical Engineer</option>
                        <option>Chemical Engineer</option>
                        <option>Civil Engineer</option>
                        <option>Electrical Engineer</option>
                        <option>Electronics Engineer</option>
                        <option>Embedded / VLSI / ASIC / Chip Design</option>
                        <option>Engineering</option>
                        <option>Environmental Engineer</option>
                        <option>Industrial Engineer</option>
                        <option>Instrumentation Engineer</option>
                        <option>Mechanical Engineer</option>
                        <option>Telecommunications Engineer</option>
                        <option>Pharmacy / Medical</option>
                        <option>Doctor</option>
                        <option>Laboratory Assistant</option>
                        <option>Medical Representative</option>
                        <option>Nurse</option>
                        <option>Nursing Attendant/Wardboy</option>
                        <option>Physiotherapist</option>
                        <option>Radiology Technician</option>
                        <option>Sales</option>
                        <option>Counter Sales</option>
                        <option>Promoter</option>
                        <option>Sales / Business Development</option>
                        <option>Telesales / Telemarketing</option>
                        <option>Services</option>
                        <option>Aayah</option>
                        <option>Beautician</option>
                        <option>Caretaker</option>
                        <option>Carpenter</option>
                        <option>Counselors</option>
                        <option>Driver</option>
                        <option>Fitness Trainer</option>
                        <option>Gardener</option>
                        <option>Hair Stylist</option>
                        <option>Housekeeping</option>
                        <option>Maid</option>
                        <option>Massuese</option>
                        <option>Photographer</option>
                        <option>Plumber</option>
                        <option>Security Guard</option>
                        <option>Spot Boy</option>
                        <option>Tailor</option>
                        <option>Tutor / Teacher</option>
                        <option>Technicians</option>
                        <option>Electrician</option>
                        <option>Fitter</option>
                        <option>Mechanic</option>
                        <option>Technician</option>
                        <option>Tower Technician</option>
                        </select>
                        <select v-show ="form.occupation == 'Govt'" v-model="form.department"  class="form-control">
                          <option>Agriculture &amp; Cooperation </option><option>Animal Husbandry &amp; Fishing </option><option>Art &amp; Culture </option><option>Chemicals &amp; Fertilizers </option><option>Coal &amp; Mine </option><option>Commerce &amp; Industry </option><option>Communications &amp; Information Technology (</option><option>Defence </option><option>Education &amp; Training </option><option>Employment &amp; Labour </option><option>Energy &amp; Power </option><option>Environment &amp; Natural Resources </option><option>Finance, Banking &amp; Insurance </option><option>Food &amp; Public Distribution </option><option>Forestry &amp; Wildlife </option><option>Governance &amp; Administration</option><option>Health &amp; Family welfare </option><option>Home affairs &amp; National Security </option><option>Housing &amp; Urban Development </option><option>Information &amp; Broadcasting </option><option>International Affairs</option><option>Law &amp; Justice</option><option>People &amp; Organisations </option><option>Petroleum, Oil &amp; Natural Gas</option><option>Rural Development &amp; Panchayati Raj </option><option>Science, Technology &amp; Research</option><option>Social Justice &amp; Empowerment </option><option>Tourism </option><option>Transport &amp; Infrastructure</option><option>Youth Affairs &amp; Sports</option>
                        </select>
                     </div>
                     </div>
                    
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form group">
                            <label>State</label>
                        <select @change="getcity()" v-model="form.state" class="form-control" name="state" :class="{'is-invalid':form.errors.has('state')}">
                          <option value="Rajasthan">Rajasthan</option>
                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                          <option value="Assam">Assam</option>
                          <option value="Bihar">Bihar</option>
                          <option value="Chhattisgarh">Chhattisgarh</option>
                          <option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
                          <option value="Daman & Diu">Daman & Diu</option>
                          <option value="Delhi">Delhi</option>
                          <option value="Goa">Goa</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="Himachal Pradesh"> Himachal Pradesh</option>
                          <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerela">Kerela</option>
                          <option value="Lakshadweep">Lakshadweep</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Orissa">Orissa</option>
                          <option value="Pondicherry">Pondicherry</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Uttrakhand">Uttrakhand</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="West Bengal">West Bengal</option>
                          
                        </select>
                            <has-error :form="form" field="state"  ></has-error>   
                        </div>
                        </div>
                          <div class="col-md-3">
                            <label>City</label>
                            <div class="form group">
                            <select v-model='form.city' class="form-control" >
                                     
                                      <option v-for="city in cities">{{city}}</option>
                            </select>   
                        </div>
                        </div>
                           <div class="col-md-3">
                         <div class="form-group">
                           
                        <button class="btn btn-success mt-3">Submit</button>  
                        </div>
                     </div>
                     </div>
                 </form>
                 
            <div class="card mt-3">
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
           cities:{},
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
       },
       getcity(){
            
            axios.get('api/getcities/'+this.form.state).then(({data})=>(this.cities = data));
           //console.log(this.cities.target.value);
          }
   },
   created(){
       this.loadmembers();
   } 
}
</script>