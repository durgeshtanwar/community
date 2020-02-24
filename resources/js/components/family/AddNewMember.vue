<template>
    <div class="container ">
     
        <div class="row ">
           <div class="col-12">
               <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title" v-if="!updatedata">Add New Family Member</h3>
                <h3 class="card-title" v-if="updatedata">Update My Information</h3>
                 <div class="card-tools">
                 <p> Gotra : {{users.gotra}} 
                   <br> Family Head : {{users.family_head}}
                 </p>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" @submit.prevent="(updatedata==true) ? updateMyDetails() : selfdata ? createMyUserDetail(): createUserDetails()" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-check">
                          <input class="form-check-input" v-if="userstatus===0"  @change="mydata"  v-model="selfdata" type="checkbox" name="selfdata" value="true" :class="{'is-invalid': form.errors.has('matrimonial')}">
                          <label class="form-check-label"  v-if="userstatus===0"><h4>Are You Inserting your own data?</h4> </label>
                          <has-error :form="form" field="selfdata"></has-error>
                        </div>
                       <div class="form-check">
                          <input class="form-check-input" v-if="userstatus===1"  @change="myuserdata" v-model="updatedata" type="checkbox" name="updatedata" value="true" :class="{'is-invalid': form.errors.has('matrimonial')}">
                          <label class="form-check-label"  v-if="userstatus===1"><h4>Update your data</h4> </label>
                          <has-error :form="form" field="selfdata"></has-error>
                        </div> 
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" v-bind:disabled="updatedata===true" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name')}" 
                          placeholder="Enter Name ..." name="name" >
                          <has-error :form="form" field="name"></has-error>
                      </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group" >
                        <label>Relation With Family Head</label>
                        <select v-model="form.relation" class="form-control" name="relation" :class="{ 'is-invalid': form.errors.has('relation')}">
                          <option value="self">Self</option>
                          <option value="wife">Wife</option>
                          <option value="son">Son</option>
                          <option value="daughter">Daughter</option>
                          <option value="grand daughter">Grand Daughter</option>
                          <option value="grand son">Grand Son</option>
                          <option value="brother">Brother</option>
                          <option value="sister">Sister</option>
                          <option value="nephew">Nephew</option>
                          <option value="neice">Neice</option>
                        </select>
                          <has-error :form="form" field="relation"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <label>Gender</label><br>
                      <div class="form-group form-check-inline">
                        
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" v-model="form.gender" value="male" :class="{ 'is-invalid': form.errors.has('gender')}">
                          <label class="form-check-label">Male</label>
                        <has-error :form="form" field="gender"></has-error>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value="female" v-model="form.gender" :class="{ 'is-invalid': form.errors.has('gender')}">
                          <label class="form-check-label">Female</label>
                        <has-error :form="form" field="gender"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" v-model="form.dob" :class="{'is-invalid': form.errors.has('dob')}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" autocomplete="off" name="dob">
                        <has-error :form="form" field="dob"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <label>Maritial Status</label><br>
                      <div class="form-group  form-check-inline">
                        
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="marriage_status" v-model="form.marriage_status" value="married" :class="{'is-invalid': form.errors.has('marriage_status')}" >
                          <label class="form-check-label">Married</label>
                          <has-error :form="form" field="marriage_status"></has-error>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" v-model="form.marriage_status" type="radio" name="marriage_status" value="engaged" :class="{'is-invalid': form.errors.has('marriage_status')}">
                          <label class="form-check-label">Engaged</label>
                          <has-error :form="form" field="marriage_status"></has-error>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="single" v-model="form.marriage_status" type="radio" name="marriage_status" checked="" :class="{'is-invalid': form.errors.has('marriage_status')}">
                          <label class="form-check-label">Single</label>
                          <has-error :form="form" field="marriage_status"></has-error>
                        </div>
                       
                          </div>
                           <div class="form-group">
                           <div class="form-check">
                          <input class="form-check-input" v-show="form.marriage_status ==='single'" v-model="form.matrimonial" type="checkbox" name="matrimonial" value="true" :class="{'is-invalid': form.errors.has('matrimonial')}">
                          <label class="form-check-label" v-show="form.marriage_status ==='single'">Do you want to be featured in our Matrimonial Section?</label>
                          <has-error :form="form" field="matrimonial"></has-error>
                        </div>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Blood Group</label>
                     <select class="form-control" name="blood_group" v-model="form.blood_group" :class="{'is-invalid':form.errors.has('blood_group')}">
                           <option value="A+ve">A+ve</option>
                           <option value="A-ve">A-ve</option>
                           <option value="B+ve">B+ve</option>
                           <option value="B-ve">B-ve</option>
                           <option value="O+ve">O+ve</option>
                           <option value="O-ve">O-ve</option>
                           <option value="AB+ve">AB+ve</option>
                           <option value="AB-ve">AB-ve</option>
                           </select> 
                         <has-error :form="form" field="blood_group"></has-error>
                        
                      </div>
                         </div>
                     <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label >Email</label>
                      
                         <input type="email" v-bind:disabled="updatedata===true" v-show="!selfdata" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.has('email')}" placeholder="Enter your email Address" name="email">
                         <input type="email"  v-show="selfdata" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.has('email')}" placeholder="Enter your email Address" name="email" disabled>                                
                         <has-error :form="form" field="email"></has-error>
                     
                        
                      </div>
                      </div>
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label>Mobile Number</label>
                          <input type="text" v-bind:disabled="updatedata===true" v-show="!selfdata" v-model="form.mobile" class="form-control" :class="{'is-invalid':form.errors.has('mobile')}" placeholder="Enter your Mobile Number" name="mobile">
                          <input type="text"  v-show="selfdata" :disabled="updatedata===1" v-model="form.mobile" class="form-control" :class="{'is-invalid':form.errors.has('mobile')}" placeholder="Enter your Mobile Number" name="mobile">
                          <has-error :form="form" field="mobile"></has-error>
                                  
                      </div>
                    </div>
                </div>
                       <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fathers Name</label>
                        <input type="text" v-model="form.father_name" class="form-control" placeholder="Enter Name ..." name="father_name" :class="{'is-invalid':form.errors.has('father_name')}" >
                      <has-error :form="form" field="father_name"></has-error>
                      </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>Mothers Name</label>
                        <input type="text" v-model="form.mother_name" class="form-control" placeholder="Mothers Name" name="mother_name" :class="{'is-invalid':form.errors.has('mother_name')}" >
                        <has-error :form="form" field="mother_name"></has-error>
                      </div>
                  </div>
                  </div>
                  <!-- input states -->
                  <div class="form-group">
                      <label class="col-form-label" for="address">Address </label>
                   <textarea v-model="form.address" class="form-control" name="address" rows="3" placeholder="Enter ..." autocomplete="off" :class="{'is-invalid':form.errors.has('address')}"></textarea>
                  <has-error :form="form" field="address"></has-error>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                        <label>City</label>
                        <input type="text" v-model="form.city" class="form-control" placeholder="Enter Name ..." name="city" :class="{'is-invalid':form.errors.has('city')}" >
                        <has-error :form="form" field="city"></has-error>
                      </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                        <label>State</label>
                        <input type="text" v-model="form.state" class="form-control" :class="{'is-invalid':form.errors.has('state')}" placeholder="Enter State Name ..." name="state" >
                        <has-error :form="form" field="state"></has-error>
                      </div>
                      </div>
                  </div>
                  <hr>
                  <div><h3>Professional Details</h3></div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Occupation</label>
                         <select v-model="form.occupation" class="form-control" name="occupation" :class="{'is-invalid':form.errors.has('occupation')}">
                          <option value="Government Job">Government Job</option>
                          <option value="Private job">Private Job</option>
                          <option value="self employed">Self Employed</option>
                          <option value="student">Student</option>
                          <option value="unemployed">Unemployed</option>
                        </select>
                        <has-error :form="form" field="occupation" ></has-error>
                          </div>
                          
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Department</label>
                            <input v-model="form.department" type="text" class="form-control" name="department" :class="{'is-invalid':form.errors.has('department')}">
                          <has-error :form="form" field="department"></has-error>
                          </div>
                          
                      </div>
                  </div>
                  <hr>
                 <div class="row">
                   <div class="col-sm-6">
                     <div class="form-group">
                       <label>Password</label>
                     <input type="password" name="password" class="form-control" v-model="form.password" :class="{'is-invalid' :form.errors.has('password') }">
                      <has-error :form="form" field="password"></has-error>
                   </div>
                   </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                       <label>Upload Image</label>
                     <input type="file" name="photo" @change="updateProfilePic" class="input-control" :class="{'is-invalid' :form.errors.has('password') }">
                      <has-error :form="form" field="password"></has-error>
                   </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-sm-6">
                   <div class="form-group">
                     <button class="btn btn-success" >Submit Form</button>
                   </div>
                   </div>
                 </div>
                </form>
              </div>

              <!-- /.card-body -->
            </div>
           </div>
        </div>
       
        </div>
        
</template>

<script>
    export default {
     data() {
        return {
          selfdata:false,
          updatedata : false,
          users:{},
          mydetails:{},
          userstatus:'',
              form: new Form({
              id:'',
              name:'',
              relation:'',
              gender:'',
              dob:'',
              marriage_status:'',
              matrimonial:'',
              email:'',
              mobile:'',
              blood_group:'',
              father_name:'',
              mother_name:'',
              address:'',
              city:'',
              state:'',
              occupation:'',
              department:'',
              self_data:'no',
              password:'',
              gotra:'',
              photo:'',
            }),
            
           
        }
      },
     methods:{
       loadusers(){
         axios.get('api/userDetails').then(({data})=>(this.users=data,
         this.form.email = data.email));
       //  axios.get('api/userDetails').then(function(data){});
         axios.get('api/checkUserStatus').then(({data})=>(this.userstatus=data));
         axios.get('api/mydetails').then(({data})=>(this.mydetails=data));
         
          },
        checkuserstatus(){
          if(this.userstatus === 0){
            if(this.selfdata=== true){
              this.createMyUserDetail
            }
            return "selfdata ? createMyUserDetail(): createUserDetails()";
          }
          else{
            return "updateSelfData()";
          }
        },

          createUserDetails(){
          this.$Progress.start();
          this.form.post('api/userDetails')
          .then(()=>{
                    Toast.fire({
                    type: 'success',
                    title: 'Member Info Saved'
              })
            this.form.reset();
          })
          .catch(()=>{
            Toast.fire({
              type: 'error',
              title: 'There is some problem'
            })
          })
         this.$Progress.finish();
          
       },
       createMyUserDetail(){
         this.$Progress.start();
          this.form.post('api/myuserDetails')
          .then(()=>{
                    Toast.fire({
                    type: 'success',
                    title: 'Member Info Saved'
              })
            this.form.reset();
          })
          .catch(()=>{
            Toast.fire({
              type: 'error',
              title: 'There is some problem'
            })
          })
         this.$Progress.finish();
        this.$Progress.start();
        this.form.put('api/updatePhoto')
        .then(()=>{
            Toast.fire({
              type: 'success',
              title:'image Uploaded succssfully'
            })
            .catch(()=>{
              Toast.fire({
                type:'error',
                title: 'error in image upload'
              })
            })
        })
        this.$Progress.finish();
       },
       mydata(){
         if(this.selfdata=== true){
           this.form.fill(this.users);
         }
         else{
           this.form.reset();
         }
       },
       myuserdata(){
         if(this.updatedata===true){
            this.form.fill(this.mydetails[0]);
         }
         else{
           this.form.reset();
         }
        
       },
        updateProfilePic(e){
          let file = e.target.files[0];
         console.log(file);
          let reader = new FileReader();
           
           if(file['size']<2111775){
              reader.onloadend = (file) => {
           // console.log('RESULT', reader.result)
           this.form.photo = reader.result;
          }          
           reader.readAsDataURL(file);
           }
           else{
             Swal.fire(
                'Oops',
                'File size is bigger than 2 mb.',
                'error'
              )

           }
          
        },
        updateMyDetails(){
          this.$Progress.start();
       this.form.put('api/updateMydetails/'+this.form.id)
       .then(()=>{
         // success
        
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
      },
      created() {
      this.loadusers();
   //   console.log(this.users.data);
      //console.log(this.users);
              }
    }
</script>
