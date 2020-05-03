<template>
  <a class='btn btn-default' v-on:click='openEdit'>{{ $root.tran('edit') }}</a>
</template>

<script>
export default{
  props: ['itid'],
  methods:{
    openEdit: function(){
      this.$parent.$refs['editIntro'].ashow();
    }
  }

}
</script>
