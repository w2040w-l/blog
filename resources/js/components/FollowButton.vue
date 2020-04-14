<template>
  <span >
    <button v-if='have==0' v-on:click='follow' type='submit' class='btn btn-default'>{{ $root.tran('follow') }}</button>
    <button v-else v-on:click='unfollow' type='submit' class='btn btn-primary'>{{ $root.tran('unfollow') }}</button>
  </span>
</template>

<script>
export default{
  props: ['ifollow', 'ihave', 'iuid', 'ihavelogin'],
  data: function (){
    return {
      follows: 0,
      have: 0,
      havelogin: 0,
      uid: null
    }
  },
  mounted(){
    this.follows = this.ifollow;
    this.have = this.ihave;
    this.havelogin = this.ihavelogin;
    this.uid = this.iuid;
  },
  methods:{

    unfollow:function (event) {
      axios
        .delete('/user/'+this.uid+'/follow')
        .then((response)=> {
          this.have = 0;
          this.follows--;
          this.$parent.$refs.followShow.follows = this.follows;
          this.$parent.$refs.followShow.update();
        }
        );
    },

    follow:function (event) {
      axios
        .post('/user/'+this.uid+'/follow')
        .then((response )=> {
          this.have = 1;
          this.follows++;
          this.$parent.$refs.followShow.follows = this.follows;
          this.$parent.$refs.followShow.update();
        }
        );
    }

  }


}
</script>
