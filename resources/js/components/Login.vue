<template>
  <li class=" list-inline-item">
    <button v-on:click='popCreate' class="home btn-link btn"><span>{{ $root.tran('login') }}</span></button>
    <popup ref='login' iwidth='400'>
      <div class='form-group'>
        <label for='username' >{{ $root.tran('username') }}</label>
        <input v-model='username' class='form-control' name="username" type="text" />
      </div>
      <div class='form-group'>
        <label for='password' >{{ $root.tran('password') }}</label>
        <input v-model='password' class='form-control' name="password" type='password' />
      </div>
      <button type="submit" class='btn btn-primary ' v-on:click='login'>{{ $root.tran('login') }}</button>
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
    login: function(){
      axios
        .post('/login',{
          'username' : this.username,
          'password' : this.password
        })
        .then((response )=> {
          location.reload();
        })
        .catch((error, response) => {
          this.$root.$refs.error.tip(error.response.data.errors);
        })
      ;
    },
    popCreate:function () {
      this.$refs.login.show = 1;
    }
  }
}
</script>
