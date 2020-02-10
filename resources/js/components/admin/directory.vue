<template>
    <div class="container ">

        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add to Directory</h3>
                <div class="card-tools">
                    <button class="btn btn-success" @click="newModel">Add New Directory
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
                      <th>Address</th>
                      <th>Gotra</th>
                      <th>Profession</th>
                      <th>Contact</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in news.data" :key="user.id">
                      <td>{{user.name}}</td>
                      <td>{{user.address}}</td>
                      <td>{{user.gotra}} </td>
                      <td>{{user.profession}}</td>
                      <td>{{user.contact_number}} </td>
                    
                      <td>{{user.city}}</td>
                      <td>{{user.state}}</td>
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
        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Directory Member</h5>
        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" @submit.prevent="editmode ? updateUser(): addtodirectory()" id="form-directory">
             <div class="model-body">   
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                     <textarea v-model="form.address" type="text" name="address"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                         <has-error :form="form" field="address"></has-error>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gotra</label>
                    <div class="col-sm-10">
                      <select class="form-control" :class="{ 'is-invalid': form.errors.has('gotra') }" name="gotra" aria-placeholder="Gotra" v-model='form.gotra'>
                                    <option value="Kuvera|Chamunda"> Kuvera</option>
                                    <option value="Mathuria|Sacchiay">Mathuria</option>
                                    <option value="Kataria|Chamunda">Kataria</option>
                                    <option value="Chaparwal|Chamunda">Chaparwal</option>
                                    <option value="Jangla|Sacchiay">Jangla</option>
                                    <option value="Mundhara|Mundhiyad">Mundhara</option>
                                    <option value="Baladh|Peeplaad">Baladh</option>
                                    <option value="Aasiwal|Chamunda">Aasiwal</option>
                                    <option value="Devera|Khinwaj">Devera</option>
                                    <option value="Lllad|Sacchiay">Lllad</option>
                                    <option value="Hatila|Chamunda">Hatila</option>
                                    <option value="Bhartani|Sacchiay">Bhartani</option>
                                    <option value="Sanvlera|Sacchiay">Sanvlera</option>
                                    <option value="Heergota|Chandi">Heergota</option>
                                    <option value="Bheenmaal|Madhyandini">Bheenmaal</option>
                                    <option value="Medatwal Aboti| Sacchiyay">Medatwal Aboti</option>

                                </select>
                     <has-error :form="form" field="gotra"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Profession</label>
                    <div class="col-sm-10">
                     <input v-model="form.profession" type="text" name="profession"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('profession') }">
                         <has-error :form="form" field="profession"></has-error>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-10">
                     <input v-model="form.contact_number" type="text" name="contact_number"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('contact_number') }">
                         <has-error :form="form" field="contact_number"></has-error>
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
                    <label  class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-10">
                     <select v-model="form.state" type="text" name="state"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('state') }">
                         <has-error :form="form" field="state"></has-error>
                     <option value="Rajasthan">Rajasthan</option>
                     <option value="Gujrat">Gujrat</option>
                     <option value="Punjab">Punjab</option>
                     <option value="Uttar Pradesh">Uttar Pradesh</option>
                     <option value="Maharashtra">Maharashtra</option>
                     <option value="Madhya Pradesh">Madhya Pradesh</option>
                     <option value="Bihar">Bihar</option>
                     <option value="Chattisgarh">Chattisgarh</option>
                     <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                     <option value="Himachal Pradesh">Himachal Pradesh</option>
                     <option value="Goa">Goa</option>
                     <option value="Haryana">Haryana</option>
                     <option value="Karnataka">Karnataka</option>
                     <option value="Jharkhand">Jharkhand</option>
                     <option value="Kerela">Kerela</option>
                     <option value="Manipur">Manipur</option>
                     <option value="Meghalaya">Meghalaya</option>
                     <option value="Telangana">Telangana</option>
                     <option value="Uttrakhand">Uttrakhand</option>
                     <option value="Tamilnadu">Tamilnadu</option>
                     <option value="Andhra Pradesh">Andhra Pradesh</option>
                     <option value="Odissa">Odissa</option>
                     <option value="Aasaam">Aasaam</option>
                     <option value="Manipur">Manipur</option>
                     <option value="Tripura">Tripura</option>
                     <option value="West Bengal">West Bengal</option>
                     <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                     <option value="Nagaland">Nagaland</option>
                     <option value="Mizoram">Mizoram</option>
                     </select>
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
             </div>
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
            form: new Form({
            id:'',
            name : '',
            address:'',
            contact_number:'',
            profession:'',
            gotra:'',
            city:'',
            state:''
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
       this.form.put('api/updatedirectory/'+this.form.id)
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
            this.form.delete('api/deletedirectory/'+id).then(()=>{
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
          axios.get('api/getdirectory?page=' + page)
            .then(response => {
              this.news = response.data;
            });
		},
        addtodirectory(event) {
          this.$Progress.start();
          this.form.post('api/addtodirectory').then(()=>{
              Toast.fire({
             type: 'success',
            title: 'Directory Updated successfully'
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
           axios.get('api/getdirectory').then(({data})=>(this.news = data));
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
