<template>
    <p class='float-right'>{{ watches }} {{ $root.tran('peoples_watching') }}</p>
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
