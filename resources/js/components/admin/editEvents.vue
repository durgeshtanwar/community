<template>
    <div class="container ">

        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add to Directory</h3>
                <div class="card-tools">
                    <button class="btn btn-success" @click="newModel">Add New Event
                    </button>
                </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Venue</th>
                      <th>Remarks</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in news.data" :key="user.id">
                      <td>{{user.event_name}}</td>
                      <td>{{user.date}}</td>
                      <td>{{user.event_venue}} </td>
                      <td>{{user.remarks}}</td>
                      
                    
                     
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
      <form class="form-horizontal" @submit.prevent="editmode ? updateUser(): applyjobs()" id="form-directory">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Event Name</label>
                    <div class="col-sm-10">
                     <input v-model="form.event_name" type="text" name="event_name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('event_name') }">
                         <has-error :form="form" field="event_name"></has-error>
                    </div>
                  </div>
                   
                   <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Event Date</label>
                          <div class="col-sm-10">
                        <input type="date" class="form-control" v-model="form.date" :class="{'is-invalid': form.errors.has('event_date')}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" autocomplete="off" name="event_date">
                        <has-error :form="form" field="event_date"></has-error>
                          </div>
                      </div>                 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Event Venue</label>
                    <div class="col-sm-10">
                     <input v-model="form.event_venue" type="text" name="event_venue"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('event_venue') }">
                         <has-error :form="form" field="event_venue"></has-error>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Remarks</label>
                    <div class="col-sm-10">
                     <input v-model="form.remarks" type="text" name="remarks"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('remarks') }">
                         <has-error :form="form" field="remarks"></has-error>
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
                event_name: '',
                date:'',
                event_venue:'',
                remarks:''
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
       this.form.put('api/event/'+this.form.id)
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
         applyjobs() {
       this.form.post('api/event').then(()=>{
            Toast.fire({
            type: 'success',
            title: 'Event Saved Successfully'
              })
              this.form.reset();
              $('#addNew').modal('hide');
            }
          ).catch(()=>{
             Toast.fire({
            type: 'error',
            title: 'some problem in the application'
              })
            
          });
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
            this.form.delete('api/event/'+id).then(()=>{
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
           axios.get('api/getEvents').then(({data})=>(this.news = data));
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
