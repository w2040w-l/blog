<template>
  <div class='card' v-if='show'>
    <div class='card-body'>
      <div v-for="(comment, index) in comments" class='row'>
        <div class='col-md-10 col-md-offset-1'>
          <a v-bind:href="'/user/'+comment.user.id">{{ comment.user.username }}</a>:
          {{ comment.content }}
        </div>
        <button v-if='iuid == comment.user.id' v-on:click='removeComment(index, comment.id)'class='btn-sm btn-danger btn-link' >delete</button>
      </div>
      <div class='form-group'>
        <label for='content'>comment content</label>
        <textarea class='form-control' id='content' name='content' v-model='content'>
        </textarea>
        <button type="submit" class='btn btn-primary' v-on:click='create'>submit comment</button>
      </div>
    </div>
  </div>
</template>

<script>
export default{
  props: ['iuid', 'iusername', 'iqid', 'iaid'],
  data: function (){
    return {
      comments: [],
      show : 0,
      init : 0,
      content: null
    }
  },
  mounted(){
  },

  methods:{
    create: function(){
      axios
        .post('/question/'+this.iqid+'/answer/'+this.iaid+'/comment',{
          'content' : this.content
        })
        .then((response )=> {
          this.content = null;
          this.comments.push(response.data);
          this.$parent.$refs['cbutton'+this.iaid].count++;
        }
        );
    },
    removeComment: function(index, cid){
      axios
        .delete('/question/'+this.iqid+'/answer/'+this.iaid+'/comment/'+cid)
        .then((response )=> {
          this.comments.splice(index, 1);
          this.$parent.$refs['cbutton'+this.iaid].count--;
        }
        );
    },
    change:function () {
      this.show = 1 - this.show;
      if(this.init == 0){
        this.init = 1;
        axios
          .get('/question/'+this.iqid+'/answer/'+this.iaid+'/comment')
          .then((response )=> {
            this.comments = response.data;
          }
          );
      }
    }

  }
}
</script>
