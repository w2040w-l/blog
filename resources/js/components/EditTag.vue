<template>
  <div>
    <button class='btn btn-primary push-left' v-on:click='popCreate'>{{ $root.tran('edit_tag') }}</button>
    <popup ref='addTag' iwidth='600' >
      <div class='form-group'>
        <label for='title'>{{ $root.tran('tag_name') }}</label>
        <h4>{{ title }}</h4>
      </div>
      <div class='form-group'>
        <label for='content'>{{ $root.tran('tag_intro') }}</label>
        <textarea class='form-control' id='content' name='content' v-model='content'>
        </textarea>
      </div>
      <button type="submit" class='btn btn-primary' v-on:click='create'>{{ $root.tran('submit_tag') }}</button>
    </popup>
  </div>
</template>

<script>
export default{
  props: ['ititle', 'icontent', 'itid'],
  data: function (){
    return {
      show : 0,
      title: null,
      content: null
    }
  },
  mounted(){
    this.title = this.ititle;
    this.content = this.icontent;
  },

  methods:{
    create: function(){
      axios
        .put('/tag/'+this.itid,{
          'content' : this.content
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
      this.$refs.addTag.show = 1;
    }
  }
}
</script>
