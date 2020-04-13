<template>
  <button v-if='appvote==0' v-on:click='rmup' type='submit' class='btn btn-primary
    btn-sm'>{{ approves }} {{ $root.tran('cancel_upvote') }}</button>
  <button v-else v-on:click="up" type='submit'
    class='btn btn-default btn-sm btn-outline-info'
  >{{ approves }} {{ $root.tran('upvote') }}</button>
</template>

<script>
export default{
  props: ['iappvote', 'iapproves', 'iansid'],
  data: function (){
    return {
      appvote: 0,
      approves: 0,
      ansid: null
    }
  },
  mounted(){
    this.appvote = this.iappvote;
    this.approves = this.iapproves;
    this.ansid = this.iansid;
  },
  methods:{

    rmup:function (event) {
      axios
        .delete('/answer/'+this.ansid+'/approve')
        .then((response)=> {
          this.appvote = 1;
          this.approves--;
        }
        );
    },

    up:function (event) {
      axios
        .post('/answer/'+this.ansid+'/approve')
        .then((response )=> {
          this.appvote = 0;
          this.approves++;
        }
        );
    }

  }


}
</script>
