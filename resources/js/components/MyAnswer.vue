<template>
  <span v-if="show == 0">
    <div class='row'>
      <div class='col-md-10 col-md-offset-1' v-html='this.content'></div>
    </div>
    <div class='float-right'>
      <a v-bind:href="'/question/'+ this.iqid +'/answer/'+this.iaid">
        updated_at {{ updated_at }}</a>
    </div>
  </span>
  <span v-else>
    <div class='row'>
      <div class='form-group col-md-10 col-md-offset-1'>
        <textarea class='form-control' id='content' name='content' v-model='rcontent'>
        </textarea>
      </div>
    </div>
    <button v-on:click='edit' class='btn btn-primary'>submit question</button>
    <button v-on:click='cancel' class='btn btn-link'>cancel</button>
    <br/>
  </span>
</template>

<script>
export default{
  props: ['iaid', 'iqid', 'icontent', 'iupdated', 'ircontent'],
  data: function (){
    return {
      show : 0,
      updated_at: null,
      content: null,
      rcontent: null
    }
  },
  mounted(){
    this.content = this.icontent;
    this.rcontent = this.ircontent;
    this.updated_at = this.iupdated;
  },

  methods:{
    edit: function(){
      axios
        .put('/question/'+ this.iqid +'/answer/' + this.iaid,{
'content' : this.rcontent
        })
        .then((response )=> {
          this.content = response.data.content;
          this.updated_at = response.data.answer.updated_at;
          this.cancel();
        }
        );
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
