<template>
    <div class="container ">

        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Application</h3>
                <div class="card-tools">
                    <button class="btn btn-success" @click="newModel">Add New Job Seeker
                        <i class="fas fa-user-plus"></i>
                    </button>
                </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Applied for</th>
                      <th>Contact</th>
                      <th>City</th>
                      <th>Status</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in news.data" :key="user.id">
                      <td>{{user.name}}</td>
                      <td>{{user.apply_for}}</td>
                      <td>{{user.contact_number}} </td>
                    
                      <td>{{user.city}}</td>
                      <td>{{user.status}}</td>
                      <td> 
                          <a href="#"  class="mr-2" @click="editModel(user)"> <i class="fa fa-edit"></i></a>
                          <a href="#" @click="deletenews(user.id)" class= "ml-2"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
            <pagination :data="news" @pagination-change-page="getResults"></pagination>
            </div>
            <!-- /.card -->
                  </div>
    <!-- Modal -->
       

  <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Apply for Job</h5>
        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form class="form-horizontal" @submit.prevent="editmode ? updateUser(): addtodirectory()" id="form-directory">
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
                   <select  class="form-control" name="apply_for"  :class="{ 'is-invalid': form.errors.has('apply_for') }" id="exampleFormControlSelect1" v-model="form.apply_for">
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
                      :form="form" field="apply_for"></has-error>
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
                <div class ="card-footer">
                  <button type="submit" v-show="!editmode" class="btn btn-success">Create</button>
                  <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                 <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                </div>
                <!-- /.card-footer -->
              </form>
      
    </div>
  </div> 
</div> 
    </div>
</template>

<script>
    export default {
      data() {
        return {
          editmode:false,
           news:{},
            form: new Form ({
         id:'',        
        name: '',
        apply_for:'',
        city:'',
        contact_number:''

      })
        }
      },
      methods: {
        newModel(){
          this.editmode=false;
          this.form.reset();
        $('#addNew').modal('show');
        },
        
        // Edit mode for the user 
         editModel(user){
           this.editmode = true;
          this.form.reset();
        $('#addNew').modal('show');
        this.form.fill(user);
        },

        updateUser(){
       this.form.put('api/updateApplication/'+ this.form.id)
       .then(()=>{
         // success
         $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
               
         
       })
       .catch(()=>{
          this.$Progress.fail();
       })

       this.$Progress.finish();


        },
        

        deletenews(id){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {

            // send   request to the server
            this.form.delete('api/deleteMyApplication/'+id).then(()=>{
               if (result.value) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
            }).catch(()=>{
              Swal.fire("failed:","There was something wrong.","warning")
            });
           
          })
        },
        getResults(page = 1) {
          axios.get('api/myApplications?page=' + page)
            .then(response => {
              this.news = response.data;
            });
		},
        addtodirectory(event) {
          this.$Progress.start();
          this.form.post('api/applyjob').then(()=>{
              Toast.fire({
             type: 'success',
            title: 'Applied for job submitted successfully'
              })

          });
        //  document.getElementById("form-directory").reset();
         console.log('durgesh');
          // document.getElementsByName('name').value = '';
        
        this.form.reset();
            // this.form.name = "";
            // this.form.profession ="";
            // this.form.address="";
            // this.for
            // this.form.city = "";
            // this.form.state = "";

         
         
          this.$Progress.finish();
         
        //  this.name = '';
          // $('#addNew').modal('hide');
        },
        loadnews(){
           axios.get('api/myApplications').then(({data})=>(this.news = data));
        }
      },
        created() {
          this.loadnews();
        },
        mounted(){
          console.log(
            "this. is mounted"
          )
        }
    }
</script>
