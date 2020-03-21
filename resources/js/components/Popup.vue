<template>
  <table v-on:click='close' v-if='show==1' class='popup'>
    <tr >
      <td  class='align-middle' >
        <div v-bind:style="{ width: iwidth + 'px' }" class='inpop' v-on:click.stop>
          <slot></slot>
        </div>
      </td>
    </tr>
  </table>
</template>

<script>
export default{
  props: ['iwidth'],
  data: function (){
    return {
      show: 0,
      width: 0
    }
  },
  mounted(){
  },
  methods:{
    close:function (event){
      this.show = 0;
    }
  }
}
</script>
