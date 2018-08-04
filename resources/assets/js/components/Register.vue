<template>
        <form class="register" @submit.prevent="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Register</div>
                        <div class="card-body">
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">                       
                                 <input class="form-control" required v-model="name" type="text"/>
                                </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">E-mail</label>
                                <div class="col-md-6">                       
                                 <input class="form-control" required v-model="email" type="email" />
                        <form-error v-if="errors.email" :errors="errors">
                              <li v-for="value in errors.email">
                                {{value}}
                              </li>                             
                        </form-error>
                                </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">                       
                                 <input class="form-control" required v-model="password" type="password"/>
                                </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">                       
                                 <input class="form-control" required v-model="password_confirmation" type="password"/>
                                 <form-error v-if="errors.password" :errors="errors">
                                  <li v-for="value in errors.password">
                                    {{value}}
                                  </li>   
                                 </form-error>
                                </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">                       
                                <select class="form-control" required v-model="city">
                                  <option value="Tomsk">Tomsk</option>
                                  <option value="Kemerovo">Kemerovo</option>
                                  <option value="Novosibirsk">Novosibirsk</option>
                                </select>
                                <form-error v-if="errors.city" :errors="errors">
                                  <li v-for="value in errors.city">
                                    {{value}}
                                  </li>   
                                 </form-error>
                                </div>
                            </div>   
                                <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">             
                            <form>
                              <input type="radio" required v-model="gender" name="male" value="male" checked> Male<br>
                              <input type="radio" required v-model="gender" name="female" value="female"> Female<br>
                            </form>
                                <form-error v-if="errors.gender" :errors="errors">
                                  <li v-for="value in errors.gender">
                                    {{value}}
                                  </li>   
                                 </form-error>
                                </div>
                            </div>   
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">Vehicle</label>
                                <div class="col-md-6"> 
                                <form>
                                  <input type="checkbox" v-model="vehicle" name="bike" value="Bike"> Bike<br>
                                  <input type="checkbox" v-model="vehicle" name="car" value="Car"> Car 
                                </form>
                                 <form-error v-if="errors.city" :errors="errors">
                                  <li v-for="value in errors.city">
                                    {{value}}
                                  </li>   
                                 </form-error>
                                 </div>
                            </div>   
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">About</label>
                                <div class="col-md-6">                       
                                 <textarea class="form-control" required v-model="about"  rows="5" cols="45"/>
                                 <form-error v-if="errors.about" :errors="errors">
                                  <li v-for="value in errors.about">
                                    {{value}}
                                  </li>   
                                 </form-error>
                                </div>
                            </div>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </form>
</template>

<script>
    export default {
        
  data () {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      city: '',
      gender: '',
      vehicle: [],
      about: '',
      errors: [],
    }
  },
  methods: {
    register () {
        axios.post('/register', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
                city: this.city,
                gender: this.gender,
                vehicle: this.vehicle.join(),
                about: this.about,
        })
        .then(response => {
        window.location.replace("/home");
        })
        .catch(error => {
        this.errors= error.response.data.errors;
        })
  }
    }
    }
</script>
