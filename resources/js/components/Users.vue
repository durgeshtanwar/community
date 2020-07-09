<template>
    <div class="container ">
        <div class="col-12 mt-5">
         
                <button class="btn btn-success btn-block mb-2 mt-2 d-lg-none" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Search <i class="fa fa-search" aria-hidden="true"></i>
  </button>
             <form class="form-horizontal collapse dont-collapse-sm" @submit.prevent="getUsers" id="collapseExample"> 
                   <div class="row mt-3">  
                    
                     <div class="col-md-4">
                     <div class="form-group">  
                       <label> Name </label>
                       <input v-model="search.name" type="text" name="name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="search by name">
                         <has-error :form="form" field="name" ></has-error>     
                     </div>
                     </div>

                     <div class="col-md-4">
                        <div class="form-group">
                          <label> Gotra </label>
                         <select class="form-control" name="gotra" aria-placeholder="Gotra" v-model='search.gotra'>
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
                     <div class="col-md-4">
                        <div class="form-group">  
                       <label> Username </label>
                       <input v-model="search.username" type="text" name="name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="search by username">
                         <has-error :form="search" field="name" ></has-error>     
                     </div>
                     </div>
                     
                                         
                     </div>
                     <div class="row mt-3">
                       <div class="col-md-3">
                       <div class="form group">
                         <label for="">Pur</label>
                         <select class="form-control" v-model="search.pur" name="pur" aria-placeholder="Gotra">
                                    <option value="NA">Not applicable</option>
                                    <option value="उरवार">उरवार</option>
                                    <option value="मखापवार">मखापवार</option>
                                    <option value="देवकुलियार">देवकुलियार</option>
                                    <option value="पडरीयार">पडरीयार</option>
                                    <option value="अदइयार">अदइयार</option>
                                    <option value="पवइयार">पवइयार</option>
                                    <option value="क्षत्रवार">क्षत्रवार</option>
                                    <option value="जम्मुवार">जम्मुवार</option>
                                    <option value="भड़रियार">भड़रियार</option>
                                    <option value="खंटवार">खंटवार</option>
                                    <option value="केरियार">केरियार</option>
                                    <option value="छेरियार">छेरियार</option>
                                    <option value="कुरईचियार">कुरईचियार</option>
                                    <option value="भलुनियार">भलुनियार</option>
                                    <option value="डुमरियार">डुमरियार</option>
                                    <option value="बाड़वार">बाड़वार</option>
                                    <option value="सरइयार">सरइयार</option>
                                    <option value="योतियार">योतियार</option>
                                    <option value="शिकरौरियार">शिकरौरियार</option>
                                    <option value="मोलियार">मोलियार</option>
                                    <option value="ऐआर">ऐआर</option>
                                    <option value="रहदौलीयार">रहदौलीयार</option>
                                    <option value="अवधियार">अवधियार</option>
                                    <option value="पुतियार">पुतियार</option>
                                    <option value="उल्लार्क">उल्लार्क</option>
                                    <option value="लोलार्क">लोलार्क</option>
                                    <option value="बालार्क">बालार्क</option>
                                    <option value="कोणार्क">कोणार्क</option>
                                    <option value="पुण्डार्क">पुण्डार्क</option>
                                    <option value="चारणार्क">चारणार्क</option>
                                    <option value="मार्कंडेय">मार्कंडेय</option>
                                    <option value="देवडीहा">देवडीहा</option>
                                    <option value="गुन्सइयाँ">गुन्सइयाँ</option>
                                    <option value="महुरसिया">महुरसिया</option>
                                    <option value="डूमरौरी">डूमरौरी</option>
                                    <option value="सपहा">सपहा</option>
                                    <option value="गुलसैया">गुलसैया</option>
                                    <option value="मल्लौर्क">मल्लौर्क</option>
                                    <option value="हरहसिया">हरहसिया</option>
                                    <option value="देवलसिया">देवलसिया</option>
                                    <option value="वरुणार्क">वरुणार्क</option>
                                    <option value="कुण्डार्क">कुण्डार्क</option>
                                    <option value="विलसैया">विलसैया</option>
                                    <option value="श्वेतभद्र">श्वेतभद्र</option>
                                    <option value="पंचकंठी">पंचकंठी</option>
                                    <option value="डूडरियार">डूडरियार</option>
                                    <option value="पठकौलियार">पठकौलियार</option>
                                    <option value="पंचहाय">पंचहाय</option>
                                    <option value="सियरी">सियरी</option>
                                    <option value="कुकरौंधा">कुकरौंधा</option>
                                    <option value="मोरियार">मोरियार</option>
                                    <option value="मिहिर/मिहीमगौरियार">मिहिर/मिहीमगौरियार</option>
                                    <option value="वेरियार">वेरियार</option>
                                    <option value="मेहोशवार">मेहोशवार</option>
                                    <option value="सौरियार">सौरियार</option>
                                    <option value="पुनरखिया">पुनरखिया</option>
                                    <option value="देवहाय">देवहाय</option>
                                    <option value="शुंडार्क">शुंडार्क</option>
                                    <option value="यत्थय">यत्थय</option>
                                    <option value="ठकुर मेराँव">ठकुर मेराँव</option>
                                    <option value="डिहिक">डिहिक</option>
                                    <option value="भड़रियार">भड़रियार</option>
                                    <option value="चंडरोह">चंडरोह</option>
                                    <option value="खजुरहा">खजुरहा</option>
                                    <option value="पट्टिश">पट्टिश</option>
                                    <option value="काझ">काझ</option>
                                    <option value="कपिश्य">कपिश्य</option>
                                    <option value="परसन">परसन</option>
                                    <option value="खंडसूपक">खंडसूपक</option>
                                    <option value="बालिबाघ">बालिबाघ</option>
                                    <option value="पिपरोहा">पिपरोहा</option>
                                    <option value="बड़सापी">बड़सापी</option>
                                </select>
                       </div>
                     </div>
                        <div class="col-md-3">
                            <div class="form group">
                            <label>State</label>
                        <select @change="getcity()" v-model="search.state" class="form-control" name="state" :class="{'is-invalid':form.errors.has('state')}">
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
                            <select v-model='search.city' class="form-control" >
                                     
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
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New User
                        <i class="fas fa-user-plus"></i>
                    </button> -->
                </div>
                   </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="printTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gotra</th>
                      <th>Pur</th>
                      <th>Type</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users.data" :key="user.username">
                      <td>{{user.username}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.gotra}}</td>
                      <td>{{user.pur}}</td>
                      <td>{{user.usertype}}</td>
                     
                      <td> 
                          <a href="#"  class="mr-2" @click="editModel(user)"> <i class="fa fa-edit"></i></a>
                          <a href="#" @click="deleteuser(user.id)" class= "ml-2"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  
                  </tbody>
                </table>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
            <pagination :data="users" v-show="this.mode==false" @pagination-change-page="getResults"></pagination>
            <pagination :data="users" v-show="this.mode==true" @pagination-change-page="getUsers"></pagination>
              <button class="btn btn-success" v-print="printObj">Print</button>
            </div>
            </div>
            <!-- /.card -->
                  </div>
    <!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="updateUser()">
      <div class="modal-body">
        <div class="form-group">
          <label> Name</label>
        <input v-model="form.name" type="text" name="name" placeholder=" Full Name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
      <has-error :form="form" field="name"></has-error>
    </div>
    
    <div class="form-group">
      <label>Family Cast</label>
        <input v-model="form.family_cast" type="text" name="family_cast" placeholder=" Your Cast"
        class="form-control" :class="{ 'is-invalid': form.errors.has('family_cast') }">
      <has-error :form="form" field="family_cast"></has-error>
    </div>

    <div class="form-group">
      <label>Family Head</label>
        <input v-model="form.family_head" type="text" name="family_head" placeholder=" Your family head"
        class="form-control" :class="{ 'is-invalid': form.errors.has('family_head') }">
      <has-error :form="form" field="family_head"></has-error>
    </div>

    <div class="form-group">
      <label>Gender</label> 
       <select class="form-control" name="gender" aria-placeholder="Gender" v-model='form.gender'>
         <option value="male">Male</option>
         <option value="female">Female</option>
       </select>
    </div>
    
    <div class="form-group">
      <label>Email</label>
        <input v-model="form.email" type="email" name="email" placeholder="email address"
        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
      <has-error :form="form" field="email"></has-error>
    </div>
    <div class="form-group">
      <label>Mobile</label>
        <input v-model="form.mobile" type="text" name="mobile" placeholder="Mobile Number"
        class="form-control" :class="{ 'is-invalid': form.errors.has('mobile') }">
      <has-error :form="form" field="mobile"></has-error>
    </div>

       <div class="form-group">
         <label>Gotra</label>
       <select class="form-control" name="gotra" aria-placeholder="Gotra" v-model='form.gotra'>
         <option value="Select your Gotra" disabled selected>Select Your Gotra</option>
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
       <div class="form-group">
         <label>Pur</label>
         <select class="form-control" name="pur" aria-placeholder="pur" v-model="form.pur">
                                    <option value="NA">Not applicable</option>
                                    <option value="उरवार">उरवार</option>
                                    <option value="मखापवार">मखापवार</option>
                                    <option value="देवकुलियार">देवकुलियार</option>
                                    <option value="पडरीयार">पडरीयार</option>
                                    <option value="अदइयार">अदइयार</option>
                                    <option value="पवइयार">पवइयार</option>
                                    <option value="क्षत्रवार">क्षत्रवार</option>
                                    <option value="जम्मुवार">जम्मुवार</option>
                                    <option value="भड़रियार">भड़रियार</option>
                                    <option value="खंटवार">खंटवार</option>
                                    <option value="केरियार">केरियार</option>
                                    <option value="छेरियार">छेरियार</option>
                                    <option value="कुरईचियार">कुरईचियार</option>
                                    <option value="भलुनियार">भलुनियार</option>
                                    <option value="डुमरियार">डुमरियार</option>
                                    <option value="बाड़वार">बाड़वार</option>
                                    <option value="सरइयार">सरइयार</option>
                                    <option value="योतियार">योतियार</option>
                                    <option value="शिकरौरियार">शिकरौरियार</option>
                                    <option value="मोलियार">मोलियार</option>
                                    <option value="ऐआर">ऐआर</option>
                                    <option value="रहदौलीयार">रहदौलीयार</option>
                                    <option value="अवधियार">अवधियार</option>
                                    <option value="पुतियार">पुतियार</option>
                                    <option value="उल्लार्क">उल्लार्क</option>
                                    <option value="लोलार्क">लोलार्क</option>
                                    <option value="बालार्क">बालार्क</option>
                                    <option value="कोणार्क">कोणार्क</option>
                                    <option value="पुण्डार्क">पुण्डार्क</option>
                                    <option value="चारणार्क">चारणार्क</option>
                                    <option value="मार्कंडेय">मार्कंडेय</option>
                                    <option value="देवडीहा">देवडीहा</option>
                                    <option value="गुन्सइयाँ">गुन्सइयाँ</option>
                                    <option value="महुरसिया">महुरसिया</option>
                                    <option value="डूमरौरी">डूमरौरी</option>
                                    <option value="सपहा">सपहा</option>
                                    <option value="गुलसैया">गुलसैया</option>
                                    <option value="मल्लौर्क">मल्लौर्क</option>
                                    <option value="हरहसिया">हरहसिया</option>
                                    <option value="देवलसिया">देवलसिया</option>
                                    <option value="वरुणार्क">वरुणार्क</option>
                                    <option value="कुण्डार्क">कुण्डार्क</option>
                                    <option value="विलसैया">विलसैया</option>
                                    <option value="श्वेतभद्र">श्वेतभद्र</option>
                                    <option value="पंचकंठी">पंचकंठी</option>
                                    <option value="डूडरियार">डूडरियार</option>
                                    <option value="पठकौलियार">पठकौलियार</option>
                                    <option value="पंचहाय">पंचहाय</option>
                                    <option value="सियरी">सियरी</option>
                                    <option value="कुकरौंधा">कुकरौंधा</option>
                                    <option value="मोरियार">मोरियार</option>
                                    <option value="मिहिर/मिहीमगौरियार">मिहिर/मिहीमगौरियार</option>
                                    <option value="वेरियार">वेरियार</option>
                                    <option value="मेहोशवार">मेहोशवार</option>
                                    <option value="सौरियार">सौरियार</option>
                                    <option value="पुनरखिया">पुनरखिया</option>
                                    <option value="देवहाय">देवहाय</option>
                                    <option value="शुंडार्क">शुंडार्क</option>
                                    <option value="यत्थय">यत्थय</option>
                                    <option value="ठकुर मेराँव">ठकुर मेराँव</option>
                                    <option value="डिहिक">डिहिक</option>
                                    <option value="भड़रियार">भड़रियार</option>
                                    <option value="चंडरोह">चंडरोह</option>
                                    <option value="खजुरहा">खजुरहा</option>
                                    <option value="पट्टिश">पट्टिश</option>
                                    <option value="काझ">काझ</option>
                                    <option value="कपिश्य">कपिश्य</option>
                                    <option value="परसन">परसन</option>
                                    <option value="खंडसूपक">खंडसूपक</option>
                                    <option value="बालिबाघ">बालिबाघ</option>
                                    <option value="पिपरोहा">पिपरोहा</option>
                                    <option value="बड़सापी">बड़सापी</option>
                                </select>
       </div>

       <div class="form-group">
         <label>Usertype</label>
       <select class="form-control" name="gotra" aria-placeholder="Gotra" v-model='form.usertype'>
         <option value="Select user type" disabled selected>Select Your Gotra</option>
         <option value="member">Member</option>
         <option value="family">Family</option>
         <option value="admin">Admin</option>
         </select>
       </div>
       

           <div class="form-group">
       <input v-model="form.password" type="password" name="password" placeholder="password"
            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
          <has-error :form="form" field="password"></has-error>
       </div>

       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit User</button>
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
          users:{},
          mode:false,
            printObj: {
              id: "printTable",
              popTitle: 'Shakdwipiya Pariwar Users Admin Area',
              extraCss: 'https://www.google.com,https://www.google.com',
             
            },
          cities:{},
          // editmode:false,
         search : new Form({
           name:'',
           gotra:'',
           username:'',
           state:'',
           city:'',
           pur:''
         }),
          form: new Form({
           id :'',
           name : '',
            email:'',
            gender:'',
            family_cast:'',
            mobile:'',
            family_head:'',
            active:'',
            password:'',
            gotra:'', 
            pur:'',
            usertype:''
          })
        }
      },
      methods: {
        getcity(){
            
            axios.get('api/getcities/'+this.search.state).then(({data})=>(this.cities = data));
           //console.log(this.cities.target.value);
          },
        deleteuser(id){
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
            this.form.delete('api/deleteuser/'+id).then(()=>{
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
          axios.get('api/user?page=' + page)
            .then(response => {
              this.users = response.data;
            });
		},
        loadUsers(){
         axios.get('api/user').then(({data})=>(this.users = data));
          
        },
        
        getUsers(page=1){
          this.mode=true;
          axios.get('api/getusers?name='+this.search.name+'&gotra='+this.search.gotra+'&username='+this.search.username+'&state='+this.search.state+'&city='+this.search.city+'&pur='+this.search.pur+'&page='+page).then(({data})=>(this.users = data));
        },
        createUser() {
          this.$Progress.start();
          this.form.post('api/user').then(()=>{
           Toast.fire({
            type: 'success',
            title: 'User created successfully' })
            $('#addNew').modal('hide');
            
          })

      
          // Toast.fire({
          //    type: 'success',
          //   title: 'User created successfully'
          //     })

          this.$Progress.finish();
        },
           editModel(user){
           this.editmode = true;
          this.form.reset();
        $('#addNew').modal('show');
        this.form.fill(user);
        this.form.password = '';
        },
        updateUser(){
          this.form.put('api/user/'+ this.form.id).then(()=>{
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


        }
      },
        created() {
           this.loadUsers();
           setInterval((()=>this.loadUsers(),3000));
        },
        mounted(){
          console.log(
            "this. is mounted"
          )
        }
    }
</script>
