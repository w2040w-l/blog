<template>
  <span>
    <button class='btn btn-primary float-left' v-on:click='ashow'>{{ $root.tran('answer') }}</button>
    <div class='answer' v-if='show == 1'>
      <div class='card '>
        <div class=' card-body'>
          <a v-bind:href="'/user/'+iuid">{{ iusername }}</a>
          <div class='row'>
            <div class='form-group col-md-10 col-md-offset-1'>
              <textarea class='form-control' id='content' name='content' v-model='content'>
              </textarea>
            </div>
          </div>
          <button v-on:click='create' class='btn btn-primary'>{{ $root.tran('submit_question') }}</button>
          <button v-on:click='cancel' class='btn btn-link'>{{ $root.tran('cancel') }}</button>
        </div>
      </div>
    </div>
  </span>
</template>

<script>
export default{
  props: ['iuid', 'iusername', 'iqid'],
  data: function (){
    return {
      show : 0,
      content: null
    }
  },
  mounted(){
  },

  methods:{
    create: function(){
      axios
        .post('/question/'+this.iqid+'/answer',{
          'content' : this.content
        })
        .then((response )=> {
          location.href =response.data;
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
