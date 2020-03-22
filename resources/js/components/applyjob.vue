<template>
<div class="container ">
        <div class="card card-warning elevation-4">
              <div class="card-header">
                <h3 class="card-title">Apply for New Job</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="applyjobs">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                     <input v-model="form.name" type="text" name="name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                         <has-error :form="form" field="name"></has-error>
                    </div>
                  </div>
                   <div class="form-group row">
                   <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Applying For</label>
                    <div class="col-sm-10">
                   <select  class="form-control" name="skill"  :class="{ 'is-invalid': form.errors.has('skill') }" id="exampleFormControlSelect1" v-model="form.skill">
                    <option>Accounts/ Banking / Finance / Tax</option>
                        <option>Accountant</option>
                        <option>Pujari</option>
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
                     <has-error
                      :form="form" field="skill"></has-error>
                    </div>
                  </div>

                 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                     <input v-model="form.city" type="text" name="city"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                         <has-error :form="form" field="city"></has-error>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-10">
                     <input v-model="form.contact_number" type="text" name="contact_number"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('contact_number') }">
                         <has-error :form="form" field="contact_number"></has-error>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
    </div>
</template>
<script>
export default {

  data(){
    return {
      jobs:{},
      form: new Form ({
        name: '',
        skill:'',
        city:'',
        contact_number:''
      })
    }
  },
   methods: {
     applyjobs() {
       this.form.post('api/applyjob').then(()=>{
            Toast.fire({
            type: 'success',
            title: 'Job Application Sent successfully'
              })
              this.form.reset();
            }
          ).catch(()=>{
             Toast.fire({
            type: 'error',
            title: 'some problem in the application'
              })
            
          });
     },
     getjobs(){
      axios.get('api/getjoblist/'+this.form.occupation).then(({data})=>(this.jobs = data));
     },
      
   },
   created(){
     this.getjobs();
   },
   computed:{
     options :()=>categories
  }
   } 

</script>