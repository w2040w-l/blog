<template>
  <span v-if='havelogin'>
    <button v-if='have==0' v-on:click='watch' type='submit' class='btn btn-default'>{{ $root.tran('watch') }}</button>
    <button v-else v-on:click='unwatch' type='submit' class='btn btn-primary'>{{ $root.tran('unwatch') }}</button>
  </span>
</template>

<script>
export default{
  props: ['iwatch', 'ihave', 'iqid', 'ihavelogin'],
  data: function (){
    return {
      watches: 0,
      have: 0,
      havelogin: 0,
      qid: null
    }
  },
  mounted(){
    this.watches = this.iwatch;
    this.have = this.ihave;
    this.havelogin = this.ihavelogin;
    this.qid = this.iqid;
  },
  methods:{

    unwatch:function (event) {
      axios
        .delete('/question/'+this.qid+'/watch')
        .then((response)=> {
          this.have = 0;
          this.watches--;
          this.$parent.$refs.watchShow.watches = this.watches;
        }
        );
    },

    watch:function (event) {
      axios
        .post('/question/'+this.qid+'/watch')
        .then((response )=> {
          this.have = 1;
          this.watches++;
          this.$parent.$refs.watchShow.watches = this.watches;
        }
        );
    }

  }


}
</script>
