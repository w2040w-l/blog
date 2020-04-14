<template>
  <li class=" list-inline-item">
    <button v-on:click='popCreate' class="home btn-link btn"><span>{{ $root.tran('register') }}</span></button>
    <popup ref='register' iwidth='400'>
      <div class='form-group'>
        <label for='username' >{{ $root.tran('username') }}</label>
        <input v-model='username' class='form-control' name="username" type="text" />
      </div>
      <div class='form-group'>
        <label for='password' >{{ $root.tran('password') }}</label>
        <input v-model='password' class='form-control' name="password" type='password' />
      </div>
      <button type="submit" class='btn btn-primary ' v-on:click='register'>{{ $root.tran('register') }}</button>
    </popup>
  </li>
</template>

<script>
export default{
  props: [],
  data: function (){
    return {
      show : 0,
      username: null,
      password: null
    }
  },
  mounted(){
  },

  methods:{
    register: function(){
      axios
        .post('/register',{
          'username' : this.username,
          'password' : this.password
        })
        .then((response )=> {
          this.$refs.register.show = 0;
          this.$root.$refs.loginbutton.popCreate();
        })
        .catch((error, response) => {
          this.$root.$refs.error.tip(error.response.data.errors);
        })
      ;
    },
    popCreate:function () {
      this.$refs.register.show = 1;
    }
  }
}
</script>
