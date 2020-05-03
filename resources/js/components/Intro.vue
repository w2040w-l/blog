<template>
  <span v-if="show == 0">
    {{ intro }}
  </span>
  <span v-else>
    <div class='row'>
      <div class='form-group col-md-10 col-md-offset-1'>
        <textarea class='form-control' id='content' name='content' v-model='intro'>
        </textarea>
      </div>
    </div>
    <button v-on:click='edit' class='btn btn-primary'>{{ $root.tran('submit_intro') }}</button>
    <button v-on:click='cancel' class='btn btn-link'>{{ $root.tran('cancel') }}</button>
    <br/>
  </span>
</template>

<script>
export default{
  props: ['iuid', 'iintro'],
  data: function (){
    return {
      show : 0,
      intro: '',
    }
  },
  mounted(){
    this.intro = this.iintro;
  },

  methods:{
    edit: function(){
      axios
        .put('/user/'+ this.iuid +'/edit',{
'intro' : this.intro
        })
        .then((response )=> {
          this.cancel();
        })
        .catch((error, response) => {
          this.$root.$refs.error.tip(error.response.data.errors);
        })
          ;
        },
    ashow:function () {
      this.show = 1;
    },
    cancel:function(){
      this.show = 0;
    }

  }
}
</script>
