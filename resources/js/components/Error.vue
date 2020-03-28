<template>
  <ul v-if="this.show == 1" class='bg-danger container list-unstyled' id='error'><li v-for='error in errors'>{{ error[0] }}</li></ul>
</template>

<script>
export default{
  props: ['iwidth'],
  data: function (){
    return {
      show: 0,
      errors: []
    }
  },
  mounted(){
  },
  methods:{
    tip: function(str){
      this.errors = str;
      this.show = 1;
      setTimeout(this.close, 3000);
    },
    close:function (event){
      this.show = 0;
    }
  }
}
</script>
