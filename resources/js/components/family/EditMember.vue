<template>
    <div class="container ">
         <div class="row ">
           <div class="col-12">
               <div class="card card-warning">
              <div class="card-header">
               <h3 class="card-title">Update User Information</h3>
                 <div class="card-tools">
                 <p> Gotra : {{users.gotra}} 
                   <br> Family Head : {{users.family_head}}
                 </p>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" @submit.prevent="updateUserDetails()" enctype="multipart/form-data">
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
                        <select v-model="form.relation" @change="relation()" class="form-control" name="relation" :class="{ 'is-invalid': form.errors.has('relation')}">
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
                           <option value="NA">I do not know</option>
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
                        <!-- <input type="text" v-model="form.state" class="form-control" :class="{'is-invalid':form.errors.has('state')}" placeholder="Enter State Name ..." name="state" > -->
                        <has-error :form="form" field="state"></has-error>
                      </div>
                      </div>
                      <div class="col-sm-6">
                        <label>City</label>
                          <div class="form-group">
                            <select v-model='form.city' class="form-control" >
                                     
                                      <option v-for="city in cities">{{city}}</option>
                            </select>
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
                          <option value="house wife">House wife</option>
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
                    <h3  v-show="form.occupation === 'student'">Educational Details</h3>
                  <div class="row" v-show="form.occupation === 'student'">
                    <div class="col-sm-6">
                  
                    <div class="form-group">
                      <label for ="">Education Level</label>
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
                    <div class="col-sm-6">
                      <div class="form-group">
                      <input class="form-check-input" v-show="form.education ==='10th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='10th'" > are you appearing in class 10 in {{ 2020 | getYear}}</label>
                     <input class="form-check-input" v-show="form.education ==='12th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='12th'" > are you appearing in class 12 in {{ 2020 | getYear}}</label>
                      <input class="form-check-input" v-show="form.education ==='8th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='8th'" > are you appearing in class 8 in {{ 2020 | getYear}}</label>
                   
                    <label v-show="form.education ==='graduate'" > Graduation Subject</label>
                    <input type="text" list="graduation" v-model="form.graduation" v-show ="form.education=='graduate'" class="form-control" />
                        <datalist id="graduation">
                          <option value="BA">BA</option>
                          <option value="BCom">BCom</option>
                          <option value="BFA">BFA</option>
                          <option value="BSc">BSc</option>
                          <option value="Btech">Btech</option>
                          <option value="BCA">BCA</option>
                          <option value="BBA">BBA</option>
                          <option value="MBBS">MBBS</option>
                        </datalist>
                        <label v-show="form.education ==='post graduate'" > Post Graduation Subject</label>
                    <input type="text" list="postgraduation" v-model="form.postGraduation" v-show ="form.education=='post graduate'" class="form-control" />
                        <datalist id="postgraduation">
                         <option value="MA">MA</option>
                         <option value="MCom">MCom</option>
                         <option value="MSc">MSc</option>
                         <option value="MS">MS</option>
                         <option value="MD">MD</option>
                         <option value="MCA">MCA</option>
                         <option value="Mtech">Mtech</option>
                        </datalist>
                      </div>
                    </div>
                     
                  </div>
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
          cities:{},
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
              education:'',
              graduation:'',
              postGraduation:'',
              current_year:'',
              self_data:'no',
              password:'',
              gotra:'',
              photo:'',
            }),
            
           
        }
      },
     methods:{
       loadusers(){
        alert (this.$route.query.id);
         axios.get('api/userDetails').then(({data})=>(this.users=data,
         this.form.email = data.email,
         this.form.mobile= data.mobile));
       //  axios.get('api/userDetails').then(function(data){});
         axios.get('api/checkUserStatus').then(({data})=>(this.userstatus=data));
         axios.get('api/mydetails').then(({data})=>(this.mydetails=data));
        // console.log(this.$route.query.user);
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
          getcity(){
            
            axios.get('api/getcities/'+this.form.state).then(({data})=>(this.cities = data));
           //console.log(this.cities.target.value);
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
       relation(){
         if(this.form.relation === 'son'){
           this.form.mother_name = '';
           this.form.father_name = this.users.family_head;
         }
         else if (this.form.relation === 'daughter'){
           this.form.father_name = '';
           this.form.mother_name = this.users.family_head;
         }
         else {
           this.form.father_name = '';
           this.form.mother_name = '';
         }
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
        console.log(this.$route.params.id);
        console.log("created");
      this.loadusers();
   //   console.log(this.users.data);
      //console.log(this.users);
              }
    }
</script>
