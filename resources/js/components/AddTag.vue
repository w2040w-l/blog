<template>
  <div>
    <button class='btn btn-primary' v-on:click='popCreate'>make a new tag</button>
    <popup ref='addTag' iwidth='600' >
      <div class='form-group'>
        <label for='title'>tag name</label>
        <input type='text' class='form-control' id='title' name='title' v-model='title'/>
      </div>
      <div class='form-group'>
        <label for='content'>tag intro</label>
        <textarea class='form-control' id='content' name='content' v-model='content'>
        </textarea>
      </div>
      <button type="submit" class='btn btn-primary' v-on:click='create'>submit tag</button>
    </popup>
  </div>
</template>

<script>
export default{
  props: [],
  data: function (){
    return {
      show : 0,
      title: null,
      content: null
    }
  },
  mounted(){
  },

  methods:{
    create: function(){
      axios
        .post('/tag',{
          'title' : this.title,
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
    popCreate:function () {
      this.$refs.addTag.show = 1;
    }
  }
}
</script>
