<template>
  <li class='list-inline-item'><a class='btn btn-default' v-on:click='showPop' >{{ follows }} {{ $root.tran('followings') }}</a>
    <popup iwidth='500' ref='followPop'>
      <ul class='list-unstyled'>

        <li v-for="follower in followers">
          <div class='answer'>
            <div class='card '>
              <div class=' card-body'>
                <a v-bind:href="'/user/' + follower.followed.id ">
                  {{ follower.followed.username }}
                </a>
              </div>
            </div>
          </div>
        </li>

      </ul>
    </popup>
  </li>
</template>

<script>
export default{
  props: ['ifollow','iuid'],
  data: function (){
    return {
      followers: [],
      follows: 0,
      uid: 0
    }
  },
  mounted(){
    this.follows = this.ifollow;
    this.uid = this.iuid;
    this.update();
  },
  methods: {
    showPop(){
      this.$refs.followPop.show = 1;
    },
    update:function () {
      axios
        .get('/user/'+this.iuid+'/followings')
        .then((response)=> {
          this.followers = response.data;
        }
        );
    }
  }

}
</script>
