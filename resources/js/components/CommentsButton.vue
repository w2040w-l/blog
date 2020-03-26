<template>
  <a class="btn btn-default btn-sm" role="button" v-on:click='changeToggle'> {{ count }} comments</a>
</template>

<script>
export default{
  props: ['icount','iaid'],
  data: function (){
    return {
      count: 0,
    }
  },
  mounted(){
    this.count = this.icount;
  },
  methods: {
    changeToggle(){
      this.$parent.$refs['comments'+this.iaid].change();
    }
  }
}
</script>
