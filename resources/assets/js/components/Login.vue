<template>
        <form class="login" @submit.prevent="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Login</div>
                        <div class="card-body">
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">E-mail</label>
                                <div class="col-md-6">                       
                                 <input class="form-control" required v-model="email" type="text"/>
                                </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">                       
                                 <input class="form-control" required v-model="password" type="password"/>
                                 <form-error v-if="errors.email" :errors="errors">
                                  <li v-for="value in errors.email">
                                    {{value}}
                                  </li>   
                                 </form-error>
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                Login
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
      email: '',
      password: '',
      errors: []
    }
  },
  methods: {
login () {
        axios.post('/login', {
                email: this.email,
                password: this.password
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
