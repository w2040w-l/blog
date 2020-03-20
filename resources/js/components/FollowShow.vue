<template>
  <li class='list-inline-item'><a class='btn btn-default' href>{{ follows }} followers</a></li>
</template>

<script>
export default{
  props: ['ifollow','iuid'],
  data: function (){
    return {
      follows: 0,
      uid: 0
    }
  },
  mounted(){
    this.follows = this.ifollow;
    this.uid = this.iuid;
  }


}
</script>
