<template>
  <li class=" list-inline-item" >
    <button v-on:click='popCreate' class="home btn-link btn"><span>{{ $root.tran('change_password') }}</span></button>
    <popup ref='register' iwidth='400'>
      <div class='form-group'>
        <label for='oldpassword' >{{ $root.tran('old_password') }}</label>
        <input v-model='password' class='form-control' name="password" type="password" />
      </div>
      <div class='form-group'>
        <label for='newpassword' >{{ $root.tran('new_password') }}</label>
        <input v-model='newpassword' class='form-control' name="newpassword" type='password' />
      </div>
      <button type="submit" class='btn btn-primary ' v-on:click='change'>{{ $root.tran('change_password') }}</button>
    </popup>
  </li>
</template>

<script>
export default{
  props: [],
  data: function (){
    return {
      show : 0,
      newpassword: null,
      password: null,
      lang: []
    }
  },
  mounted(){
    this.lang = this.$root.lang;
  },

  methods:{
    change: function(){
      axios
        .post('/changepassword',{
          'newpassword' : this.newpassword,
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
      this.$refs.register.show = 1;
    }
  }
}
</script>
