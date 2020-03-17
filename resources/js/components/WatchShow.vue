<template>
    <p class='float-right'>{{ watches }} peoples is watching</p>
</template>

<script>
export default{
  props: ['iwatch'],
  data: function (){
    return {
      watches: 0
    }
  },
  mounted(){
    this.watches = this.iwatch;
  }


}
</script>
