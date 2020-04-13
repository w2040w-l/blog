<template>
  <li class="list-inline-item">
    <button v-on:click="makeToggle">{{ $root.tran('language') }}</button>
    <ul class='toggle list-unstyled' v-if="this.toggle == 1">
      <li v-for='tag in this.tags'>
        <a class='btn' v-on:click="changeLang(tag)">{{ tag }}</a>
      </li>
    </ul>
  </li>
</template>

<script>
export default{
  props: [],
  data: function (){
    return {
      tags: ['en', 'zh'],
      toggle : 0,
      newpassword: null,
      password: null
    }
  },
  mounted(){
  },

  methods:{
    changeLang: function(lang){
      axios
        .get('/language/'+lang,{
        })
        .then((response )=> {
          location.reload();
        })
        .catch((error, response) => {
          this.$root.$refs.error.tip(error.response.data.errors);
        })
      ;
    },
    makeToggle: function (){
      this.toggle = 1 - this.toggle;
    },
    closeToggle: function (){
      this.toggle = 0;
    },
  }
}
</script>
