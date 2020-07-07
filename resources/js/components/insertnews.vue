<template>
    <div class="container ">

        <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">News</h3>
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
        <h5 class="modal-title" id="addNewLabel">Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" @submit.prevent="insertnews">
             <div class="model-body">   
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">News Title</label>
                    <div class="col-sm-10">
                     <input v-model="form.news_title" type="text" name="news_title"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('news_title') }">
                         <has-error :form="form" field="news_title"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">News Description</label>
                    <div class="col-sm-10">
                     <textarea v-model="form.news_description" type="text" name="news_description"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('news_description') }"></textarea>
                         <has-error :form="form" field="news_description"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">url</label>
                    <div class="col-sm-10">
                     <input v-model="form.url" type="text" name="url"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('url') }">
                         <has-error :form="form" field="url"></has-error>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                     <select v-model="form.status" type="text" name="status"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                         <has-error :form="form" field="status"></has-error>
                     <option value="enable">Enable</option>
                     <option value="disable">Disable</option>
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
            news_title : '',
            news_description:'',
            url:'',
            status:''
           
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
        insertnews() {
          this.$Progress.start();
          this.form.post('api/insertnews');
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
