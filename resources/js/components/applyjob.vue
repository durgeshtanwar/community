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
                     <option value="Data Entry Operator">Data Entry Operator</option>
                     <option value="Accountant">Accountant</option>
                     <option value="Electrician">Electrician</option>
                     <option value="Plumber">Plumber</option>
                     <option value="Gym Instructor">Gym Instructor</option>
                     <option value="Software Engineer">Software Engineer</option>
                     <option value="Nurse">Nurse</option>
                     <option value="Carpenter">carpanter</option>
                     <option value="Pandit">Pandit</option>
                     <option value="Pujari">Pujari</option>
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
      categories:[],
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
       axios.get('api/jobcategory').then(([data])=>(this.category = data))
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