<template>
    <div class="container ">

        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add to Directory</h3>
                <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New News
                        <i class="fas fa-user-plus"></i>
                    </button>
                </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>News</th>
                      <th>Description</th>
                      <th>Url</th>
                      <th>Status</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in news" :key="user.id">
                      <td>{{user.news_title}}</td>
                      <td>{{user.news_description}}</td>
                      <td>{{user.url}}</td>
                      <td><span class="tag tag-success">{{user.status}}</span></td>
                      <td> 
                          <a href="#"  class="mr-2"> <i class="fa fa-edit"></i></a>
                          <a href="#" @click="deletenews(user.id)" class= "ml-2"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                  </div>
    <!-- Modal -->
       

       <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Add New Directory Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" @submit.prevent="addtodirectory">
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
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
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
           news:{},
            form: new Form({
            name : '',
            address:'',
            profession:'',
            city:'',
            state:''
           })
        }
      },
      methods: {
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
            this.form.delete('api/deletenews/'+id).then(()=>{
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
        addtodirectory() {
          this.$Progress.start();
          this.form.post('api/addtodirectory');
          Toast.fire({
             type: 'success',
            title: 'News Inserted successfully'
              })

          this.$Progress.finish();
        },
        loadnews(){
           axios.get('api/getnews').then(({data})=>(this.news = data.data));
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
